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
    protected $fillable = ['id', 'name', 'code', 'credits', 'semester', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public static function setDynamicConnection()
    {
        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }

    public function moduls()
    {
        return $this->hasMany(Modul::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
