<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'kalenders';
    protected $fillable = ['file', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];
}
