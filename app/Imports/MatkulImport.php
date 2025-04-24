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
        $code = $row[2];
        $credits = $row[3];
        $semester = $row[4];
        $user_id = auth()->user()->id;

        $checkMatkul = Matkul::where('code', $code)->first();

        if ($checkMatkul) {
            $checkMatkul->update([
                'name' => $name,
                'code' => $code,
                'credits' => $credits,
                'semester' => $semester,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Matkul([
                'name' => $name,
                'code' => $code,
                'credits' => $credits,
                'semester' => $semester,
                'user_id' => $user_id,
            ]);
        }
    }


    public function startRow(): int
    {
        return 4;
    }
}
