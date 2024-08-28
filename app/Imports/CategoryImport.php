<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Era;
use App\Models\link;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class CategoryImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $era = Era::where('name', $row[3])->first();

        if (!$era) {
            $era = Era::create([
                'id' => Str::uuid(),
                'name' => $row[3],
                'img' => null,
            ]);
        }

        $link = link::where('name', $row[1])->first();

        if (!$link) {
            $link = link::create([
                'id' => Str::uuid(),
                'name' => $row[1],
                'img' => null,
            ]);
        }

        $checkCategory = Category::where('name', $row[2])->first();

        if ($checkCategory) {
            $checkCategory->update([
                'img' => $row[4] ?? $checkCategory->img,
                'desc' => $row[5] ?? $checkCategory->desc,
                'era_id' => $era->id,
                'link_id' => $link->id,
            ]);

            return null;
        }

        return new Category([
            'id' => Str::uuid(),
            'name' => $row[2],
            'img' => $row[4] ?? null,
            'desc' => $row[5] ?? null,
            'era_id' => $era->id ?? null,
            'link_id' => $link->id ?? null,
        ]);
    }

    public function startRow(): int
    {
        return 3;
    }
}
