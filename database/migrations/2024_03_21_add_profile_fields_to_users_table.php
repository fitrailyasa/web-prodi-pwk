<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya tambahkan kolom jika belum ada
            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image')->nullable()->after('position');
            }
            if (!Schema::hasColumn('users', 'whatsapp')) {
                $table->string('whatsapp')->nullable()->after('image');
            }
            if (!Schema::hasColumn('users', 'linkedin')) {
                $table->string('linkedin')->nullable()->after('whatsapp');
            }
            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('linkedin');
            }
            if (!Schema::hasColumn('users', 'education')) {
                $table->string('education')->nullable()->after('bio');
            }
            if (!Schema::hasColumn('users', 'expertise')) {
                $table->string('expertise')->nullable()->after('education');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya hapus kolom yang kita tambahkan
            if (Schema::hasColumn('users', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('users', 'whatsapp')) {
                $table->dropColumn('whatsapp');
            }
            if (Schema::hasColumn('users', 'linkedin')) {
                $table->dropColumn('linkedin');
            }
            if (Schema::hasColumn('users', 'bio')) {
                $table->dropColumn('bio');
            }
            if (Schema::hasColumn('users', 'education')) {
                $table->dropColumn('education');
            }
            if (Schema::hasColumn('users', 'expertise')) {
                $table->dropColumn('expertise');
            }
        });
    }
};
