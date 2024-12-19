<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Matkul extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'matkuls';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'code', 'slug', 'credits', 'class', 'room', 'lecture', 'day', 'start_time', 'end_time', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public static function setDynamicConnection()
    {
        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'lecture', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
