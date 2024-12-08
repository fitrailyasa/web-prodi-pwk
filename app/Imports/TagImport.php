<?php

namespace App\Imports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TagImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];

        $checkTag = Tag::where('name', $name)->first();

        if (!$checkTag) {
            return new Tag([
                'name' => $name,
            ]);
        }

        return null;
    }

    public function startRow(): int
    {
        return 3;
    }
}
