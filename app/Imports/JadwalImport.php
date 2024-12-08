<?php

namespace App\Imports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class JadwalImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;
        $user_id = auth()->user()->id;

        $checkJadwal = Jadwal::where('name', $name)->first();

        if ($checkJadwal) {
            $checkJadwal->update([
                'img' => $img,
                'desc' => $desc,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Jadwal([
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
