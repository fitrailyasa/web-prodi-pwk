<?php

namespace App\Imports;

use App\Models\Jadwal;
use App\Models\Matkul; // Kalau kamu butuh ambil ID dari nama
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class JadwalImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $matkulName = $row[1] ?? 1;
        $class = $row[2];
        $room = $row[3];
        $lecture = $row[4] ?? 1;
        $day = $row[5];
        $timeRange = $row[6]; // format "10:00 - 12:00"

        [$start_time, $end_time] = array_map('trim', explode('-', $timeRange));

        $matkul = Matkul::where('name', $matkulName)->first();
        $matkul_id = $matkul ? $matkul->id : null;

        $checkJadwal = Jadwal::where('matkul_id', $matkul_id)
            ->where('day', $day)
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->first();

        if ($checkJadwal) {
            $checkJadwal->update([
                'matkul_id' => $matkul_id,
                'class' => $class,
                'room' => $room,
                'lecture' => $lecture,
                'day' => $day,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'user_id' => auth()->user()->id
            ]);
            return null;
        } else {
            return new Jadwal([
                'matkul_id' => $matkul_id,
                'class' => $class,
                'room' => $room,
                'lecture' => $lecture,
                'day' => $day,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'user_id' => auth()->user()->id
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
