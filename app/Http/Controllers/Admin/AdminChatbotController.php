<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotQuestion;
use App\Models\ChatbotAnswer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChatbotExport;
use App\Imports\ChatbotImport;
use App\Http\Requests\ChatbotRequest;

class AdminChatbotController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,25,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 25, 50, 100]) ? $perPage : 10;

        $chatbots = ChatbotQuestion::when($search, function ($query) use ($search) {
            return $query->where('question_text', 'like', "%{$search}%")
                ->orWhere('keywords', 'like', "%{$search}%");
        })
            ->with('answers')
            ->latest()
            ->paginate($validPerPage);

        $counter = ($chatbots->currentPage() - 1) * $chatbots->perPage() + 1;

        return view('admin.chatbot.index', compact('chatbots', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ChatbotImport, $request->file('file'));
        return back()->with('alert', 'Berhasil mengimport data chatbot!');
    }

    public function export()
    {
        return Excel::download(new ChatbotExport, 'Data Chatbot.xlsx');
    }

    public function store(ChatbotRequest $request)
    {
        $validatedData = $request->validated();

        $question = ChatbotQuestion::create([
            'question_text' => $validatedData['question_text'],
            'keywords' => $validatedData['keywords']
        ]);

        foreach ($validatedData['answers'] as $answer) {
            ChatbotAnswer::create([
                'question_id' => $question->id,
                'answer_text' => $answer
            ]);
        }

        return back()->with('alert', 'Berhasil menambah data chatbot!');
    }

    public function update(ChatbotRequest $request, $id)
    {
        $validatedData = $request->validated();
        $question = ChatbotQuestion::findOrFail($id);

        $question->update([
            'question_text' => $validatedData['question_text'],
            'keywords' => $validatedData['keywords']
        ]);

        // Delete existing answers
        $question->answers()->delete();

        // Create new answers
        foreach ($validatedData['answers'] as $answer) {
            ChatbotAnswer::create([
                'question_id' => $question->id,
                'answer_text' => $answer
            ]);
        }

        return back()->with('alert', 'Berhasil mengubah data chatbot!');
    }

    public function destroy($id)
    {
        ChatbotQuestion::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil menghapus data chatbot!');
    }

    public function destroyAll()
    {
        ChatbotQuestion::truncate();
        return back()->with('alert', 'Berhasil menghapus semua data chatbot!');
    }

    public function show($id)
    {
        $question = ChatbotQuestion::with('answers')->findOrFail($id);
        return response()->json($question);
    }
}
