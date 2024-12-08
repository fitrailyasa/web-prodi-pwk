<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AlumniImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $class_year = $row[2];
        $graduation_year = $row[3];
        $work = $row[4];
        $company = $row[5];

        $checkAlumni = Alumni::where('name', $name)->first();

        if ($checkAlumni) {
            $checkAlumni->update([
                'class_year' => $class_year,
                'graduation_year' => $graduation_year,
                'work' => $work,
                'company' => $company,
            ]);

            return null;
        } else {
            return new Alumni([
                'name' => $name,
                'class_year' => $class_year,
                'graduation_year' => $graduation_year,
                'work' => $work,
                'company' => $company,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
