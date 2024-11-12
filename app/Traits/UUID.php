<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait UUID
{
    protected static function bootUUID()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
