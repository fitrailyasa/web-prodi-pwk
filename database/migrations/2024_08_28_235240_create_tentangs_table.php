<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tentangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('vision');
            $table->text('mission')->nullable();
            $table->text('goals')->nullable();
            $table->integer('total_lecture')->nullable();
            $table->integer('total_student')->nullable();
            $table->integer('total_teaching_staff')->nullable();
            $table->string('img')->nullable();

            // Contact Information
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();

            // Social Media Links
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('tiktok_url')->nullable();

            // Location Information
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('maps_url')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentangs');
    }
};
