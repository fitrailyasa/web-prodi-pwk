<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tentang extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'tentangs';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'vision', 'mission', 'goals', 'total_lecture', 'total_student', 'total_teaching_staff', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    // kurang summary

    public static function setDynamicConnection()
    {
        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
