<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'benefits',
        'link',
        'user_id'
    ];

    protected $casts = [
        'benefits' => 'array'
    ];
}
