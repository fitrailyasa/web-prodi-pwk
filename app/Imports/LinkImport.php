<?php

namespace App\Imports;

use App\Models\Link;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LinkImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        // 'name', 'desc', 'link', 'img', 'category',
        $name = $row[1];
        $desc = $row[2] ?? null;
        $link = $row[3] ?? null;
        $category = $row[4] ?? null;

        $checkLink = Link::where('name', $name)->first();

        if ($checkLink) {
            $checkLink->update([
                'desc' => $desc,
                'link' => $link,
                'category' => $category,
            ]);

            return null;
        } else {
            return new Link([
                'name' => $name,
                'desc' => $desc,
                'link' => $link,
                'category' => $category,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
