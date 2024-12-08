<?php

namespace App\Imports;

use App\Models\Matkul;
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
        $date = $row[5];
        $user_id = auth()->user()->id;

        $checkMatkul = Matkul::where('name', $name)->first();

        if ($checkMatkul) {
            $checkMatkul->update([
                'desc' => $desc,
                'credits' => $credits,
                'lecture' => $lecture,
                'date' => $date,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Matkul([
                'name' => $name,
                'desc' => $desc,
                'credits' => $credits,
                'lecture' => $lecture,
                'date' => $date,
                'user_id' => $user_id,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
