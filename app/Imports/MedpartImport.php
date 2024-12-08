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
        $user_id = auth()->user()->id;

        $checkMedpart = Medpart::where('name', $name)->first();

        if ($checkMedpart) {
            $checkMedpart->update([
                'link' => $link,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Medpart([
                'name' => $name,
                'link' => $link,
                'user_id' => $user_id,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
