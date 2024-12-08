<?php

namespace App\Imports;

use App\Models\Tentang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TentangImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;
        $user_id = auth()->user()->id;

        $checkTentang = Tentang::where('name', $name)->first();

        if ($checkTentang) {
            $checkTentang->update([
                'img' => $img,
                'desc' => $desc,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Tentang([
                'name' => $name,
                'img' => $img,
                'desc' => $desc,
                'user_id' => $user_id,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
