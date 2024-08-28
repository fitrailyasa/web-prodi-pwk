<?php

namespace App\Imports;

use App\Models\Matkul;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MatkulImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkMatkul = Matkul::where('name', $name)->first();

        if ($checkMatkul) {
            $checkMatkul->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Matkul([
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
