<?php

namespace App\Imports;

use App\Models\Medpart;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MedpartImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkMedpart = Medpart::where('name', $name)->first();

        if ($checkMedpart) {
            $checkMedpart->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Medpart([
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
