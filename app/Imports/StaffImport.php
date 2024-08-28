<?php

namespace App\Imports;

use App\Models\Staff;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StaffImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkStaff = Staff::where('name', $name)->first();

        if ($checkStaff) {
            $checkStaff->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Staff([
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
