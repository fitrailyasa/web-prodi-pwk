<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'publisher',
        'year',
        'link',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
