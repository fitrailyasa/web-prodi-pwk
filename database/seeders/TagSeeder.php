<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Tag::factory(20)->create();
    }
}
