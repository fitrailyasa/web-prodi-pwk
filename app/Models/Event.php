<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $connection;
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'slug', 'desc', 'img', 'status', 'event_date', 'publish_date', 'views', 'tag_id', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public static function setDynamicConnection()
    {
        DB::setDefaultConnection(env('DB_CONNECTION'));
        // DB::setDefaultConnection(env('DB2_CONNECTION'));
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $model->slug = Str::slug($model->name, '-');
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name, '-');
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
