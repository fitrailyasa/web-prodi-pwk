<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AlumniImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkAlumni = Alumni::where('name', $name)->first();

        if ($checkAlumni) {
            $checkAlumni->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Alumni([
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
