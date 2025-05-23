<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokKeahlian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'bidang',
        'user_id'
    ];

    protected $casts = [
        'bidang' => 'array'
    ];
}
