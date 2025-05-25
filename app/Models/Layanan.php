<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Layanan extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'layanans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'file', 'link', 'linkType', 'type', 'user_id'];
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
}
