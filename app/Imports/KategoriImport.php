<?php

namespace App\Imports;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KategoriImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkKategori = Kategori::where('name', $name)->first();

        if ($checkKategori) {
            $checkKategori->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Kategori([
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
