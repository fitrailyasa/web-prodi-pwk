<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dosen_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->string('google_scholar')->nullable();
            $table->string('scopus_id')->nullable();
            $table->string('sinta_id')->nullable();
            $table->string('orcid_id')->nullable();
            $table->text('research_interests')->nullable();
            $table->text('achievements')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_profiles');
    }
};
