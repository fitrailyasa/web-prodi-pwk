<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatbotAnswer extends Model
{
    protected $fillable = [
        'question_id',
        'answer_text',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(ChatbotQuestion::class, 'question_id');
    }
}
