<?php

namespace App\Imports;

use App\Models\Berita;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BeritaImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $img = $row[2] ?? null;
        $desc = $row[3] ?? null;

        $checkBerita = Berita::where('name', $name)->first();

        if ($checkBerita) {
            $checkBerita->update([
                'img' => $img,
                'desc' => $desc,
            ]);

            return null;
        } else {
            return new Berita([
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
