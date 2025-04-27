<?php

namespace App\Imports;

use App\Models\Berita;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Auth;

class BeritaImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if (empty($row[1])) {
            return null;
        }

        $name = trim($row[1]);
        $desc = trim($row[2] ?? '');
        $status = trim($row[3] ?? 'unpublish');
        $event_date = $this->parseDate($row[4] ?? null);
        $publish_date = $this->parseDate($row[5] ?? null);
        $tagName = trim($row[6] ?? null);
        $user_id = Auth::id();

        $tag = Tag::firstOrCreate(
            ['name' => $tagName],
            ['user_id' => $user_id]
        );

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

    private function parseDate($date)
    {
        if (!$date) {
            return null;
        }

        try {
            return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        } catch (\Exception $e) {
            try {
                return \Carbon\Carbon::parse($date)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }
    }
}
