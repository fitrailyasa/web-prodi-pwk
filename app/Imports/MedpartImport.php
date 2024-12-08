<?php

namespace App\Imports;

use App\Models\Medpart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MedpartImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $link = $row[2] ?? null;

        $checkMedpart = Medpart::where('name', $name)->first();

        if ($checkMedpart) {
            $checkMedpart->update([
                'link' => $link,
            ]);

            return null;
        } else {
            return new Medpart([
                'name' => $name,
                'link' => $link,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
