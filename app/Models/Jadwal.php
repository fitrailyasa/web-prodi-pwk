<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Jadwal extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'jadwals';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'matkul_id', 'class', 'room', 'lecture', 'day', 'start_time', 'end_time', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public static function setDynamicConnection()
    {
        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
    
    public function dosen()
    {
        return $this->belongsTo(User::class, 'lecture', 'id');
    }
}
