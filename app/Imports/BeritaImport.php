<?php

namespace App\Imports;

use App\Models\Berita;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BeritaImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $name = $row[1];
        $desc = $row[2];
        $status = $row[3];
        $event_date = $row[4];
        $publish_date = $row[5];
        $tag = $row[6];
        $user_id = auth()->user()->id;

        // tag id by name
        $tag = Tag::where('name', $tag)->first();

        $checkBerita = Berita::where('name', $name)->first();

        if ($checkBerita) {
            $checkBerita->update([
                'desc' => $desc,
                'status' => $status,
                'event_date' => $event_date,
                'publish_date' => $publish_date,
                'tag_id' => $tag->id,
                'user_id' => $user_id,
            ]);

            return null;
        } else {
            return new Berita([
                'name' => $name,
                'desc' => $desc,
                'status' => $status,
                'event_date' => $event_date,
                'publish_date' => $publish_date,
                'tag_id' => $tag->id,
                'user_id' => $user_id,
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
