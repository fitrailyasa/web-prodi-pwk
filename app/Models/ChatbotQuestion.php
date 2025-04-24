<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatbotQuestion extends Model
{
    protected $fillable = [
        'question_text',
        'keywords',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(ChatbotAnswer::class, 'question_id');
    }
}
