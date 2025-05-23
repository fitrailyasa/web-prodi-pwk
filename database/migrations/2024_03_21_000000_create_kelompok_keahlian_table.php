<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kelompok_keahlians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->json('bidang');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelompok_keahlians');
    }
};
