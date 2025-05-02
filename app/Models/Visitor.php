<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visitor extends Model
{

    use HasFactory;
    protected $table = 'table_visitor';

    protected $fillable = [
        'id',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at'
    ];

    public static function setDynamicConnection()
    {
        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }
}
