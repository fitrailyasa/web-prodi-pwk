<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatbotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_text' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'question_text.required' => 'Pertanyaan tidak boleh kosong!',
            'question_text.max' => 'Pertanyaan maksimal 255 karakter!',
            'keywords.required' => 'Kata kunci tidak boleh kosong!',
            'keywords.max' => 'Kata kunci maksimal 255 karakter!',
            'answers.required' => 'Jawaban tidak boleh kosong!',
            'answers.*.required' => 'Jawaban tidak boleh kosong!',
            'answers.*.max' => 'Jawaban maksimal 1000 karakter!'
        ];
    }
}
