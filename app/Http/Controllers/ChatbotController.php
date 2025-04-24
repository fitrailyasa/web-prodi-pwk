<?php

namespace App\Http\Controllers;

use App\Models\ChatbotQuestion;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function getResponse(Request $request)
    {
        $userMessage = $request->input('message');

        // Cari pertanyaan yang cocok berdasarkan kata kunci
        $questions = ChatbotQuestion::all();
        $bestMatch = null;
        $highestScore = 0;

        foreach ($questions as $question) {
            $keywords = explode(',', $question->keywords);
            $score = 0;

            foreach ($keywords as $keyword) {
                if (str_contains(strtolower($userMessage), strtolower(trim($keyword)))) {
                    $score++;
                }
            }

            if ($score > $highestScore) {
                $highestScore = $score;
                $bestMatch = $question;
            }
        }

        if ($bestMatch && $highestScore > 0) {
            $answer = $bestMatch->answers()->inRandomOrder()->first();
            if ($answer) {
                return response()->json([
                    'success' => true,
                    'message' => $answer->answer_text
                ]);
            }
        }

        // Default response jika tidak ada yang cocok
        return response()->json([
            'success' => true,
            'message' => 'Maaf, saya tidak mengerti pertanyaan Anda. Silakan coba pertanyaan lain atau hubungi admin untuk informasi lebih lanjut.'
        ]);
    }
}
