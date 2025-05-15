<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'nip',
        'nidn',
        'position',
        'education',
        'expertise',
        'google_scholar',
        'scopus_id',
        'sinta_id',
        'research_interests',
        'achievements',
        'img',
        'whatsapp',
        'linkedin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
