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
        $user_id = auth()->user()->id;

        $checkTag = Tag::where('name', $name)->first();

        if (!$checkTag) {
            return new Tag([
                'name' => $name,
                'user_id' => $user_id,
            ]);
        }

        return null;
    }

    public function startRow(): int
    {
        return 3;
    }
}
