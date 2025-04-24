<?php

namespace App\Imports;

use App\Models\ChatbotQuestion;
use App\Models\ChatbotAnswer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ChatbotImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $question_text = $row[1];
        $keywords = $row[2];
        $answers = explode('|', $row[3]);

        $checkQuestion = ChatbotQuestion::where('question_text', $question_text)->first();

        if ($checkQuestion) {
            // Update existing question
            $checkQuestion->update([
                'keywords' => $keywords
            ]);

            // Delete existing answers
            $checkQuestion->answers()->delete();

            // Create new answers
            foreach ($answers as $answer) {
                ChatbotAnswer::create([
                    'question_id' => $checkQuestion->id,
                    'answer_text' => trim($answer)
                ]);
            }

            return null;
        } else {
            // Create new question
            $question = ChatbotQuestion::create([
                'question_text' => $question_text,
                'keywords' => $keywords
            ]);

            // Create answers
            foreach ($answers as $answer) {
                ChatbotAnswer::create([
                    'question_id' => $question->id,
                    'answer_text' => trim($answer)
                ]);
            }

            return $question;
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
