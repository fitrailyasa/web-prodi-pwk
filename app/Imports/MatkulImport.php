<?php

namespace App\Imports;

use App\Models\Matkul;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MatkulImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if (!isset($row[1]) || !isset($row[2])) {
            return null;
        }

        $name = trim($row[1]);
        $code = trim($row[2]);
        $credits = (int) ($row[3] ?? 0);
        $semester = (int) ($row[4] ?? 0);
        $user_id = auth()->id();

        $checkMatkul = Matkul::where('code', $code)->first();

        if ($checkMatkul) {
            $checkMatkul->update([
                'name' => $name,
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
        return 3;
    }
}
