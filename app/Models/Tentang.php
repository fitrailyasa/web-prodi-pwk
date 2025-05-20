<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Tentang extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'tentangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'vision',
        'mission',
        'goals',
        'total_lecture',
        'total_student',
        'total_teaching_staff',
        'user_id',
        'address',
        'phone',
        'email',
        'description',
        'instagram_url',
        'youtube_url',
        'tiktok_url',
        'semester',
        'year',
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
    public function getMissionAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    public function setMissionAttribute($value)
    {
        $this->attributes['mission'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getGoalsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    public function setGoalsAttribute($value)
    {
        $this->attributes['goals'] = is_array($value) ? json_encode($value) : $value;
    }
}
