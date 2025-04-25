<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'nidn',
        'google_scholar',
        'scopus_id',
        'sinta_id',
        'orcid_id',
        'research_interests',
        'achievements'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
