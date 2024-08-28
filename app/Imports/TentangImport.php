<?php

namespace App\Imports;

use App\Models\Tentang;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TentangImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkTentang = Tentang::where('name', $name)->first();

        if ($checkTentang) {
            $checkTentang->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Tentang([
                'id' => Str::uuid(),
                'name' => $name,
                'img' => $img,
                'desc' => $desc,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
