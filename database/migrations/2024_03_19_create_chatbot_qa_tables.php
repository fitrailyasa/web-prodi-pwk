<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_text');
            $table->text('keywords')->nullable(); // Kata kunci untuk mencocokkan pertanyaan
            $table->timestamps();
        });

        Schema::create('chatbot_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('chatbot_questions')->onDelete('cascade');
            $table->text('answer_text');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_answers');
        Schema::dropIfExists('chatbot_questions');
    }
};
