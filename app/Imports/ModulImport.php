<?php

namespace App\Imports;

use App\Models\Modul;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ModulImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $desc = $row[2] ?? null;
        $file = $row[3] ?? null;
        $category = $row[4] ?? null;
        $user_id = auth()->user()->id;

        $checkModul = Modul::where('name', $name)->first();

        if ($checkModul) {
            $checkModul->update([
                'desc' => $desc,
                'file' => $file,
                'category' => $category,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Modul([
                'name' => $name,
                'desc' => $desc,
                'file' => $file,
                'category' => $category,
                'user_id' => $user_id,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
