<?php

namespace App\Imports;

use App\Models\Layanan;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LayananImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkLayanan = Layanan::where('name', $name)->first();

        if ($checkLayanan) {
            $checkLayanan->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Layanan([
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
