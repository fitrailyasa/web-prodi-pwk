<?php

namespace App\Imports;

use App\Models\Matkul;
use App\Models\Jadwal;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MatkulImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $desc = $row[2];
        $credits = $row[3];
        $lecture = $row[4];
        $jadwal_id = $row[5];

        // jadwal id by name
        $jadwal = Jadwal::where('name', $jadwal_id)->first();

        $checkMatkul = Matkul::where('name', $name)->first();

        if ($checkMatkul) {
            $checkMatkul->update([
                'desc' => $desc,
                'credits' => $credits,
                'lecture' => $lecture,
                'jadwal_id' => $jadwal->id,
            ]);

            return null;
        } else {
            return new Matkul([
                'name' => $name,
                'desc' => $desc,
                'credits' => $credits,
                'lecture' => $lecture,
                'jadwal_id' => $jadwal->id,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
