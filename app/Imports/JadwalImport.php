<?php

namespace App\Imports;

use App\Models\Jadwal;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class JadwalImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkJadwal = Jadwal::where('name', $name)->first();

        if ($checkJadwal) {
            $checkJadwal->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Jadwal([
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
