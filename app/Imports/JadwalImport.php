<?php

namespace App\Imports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class JadwalImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $matkul_id = $row[1];
        $class = $row[2];
        $room = $row[3];
        $lecture = $row[4];
        $day = $row[5];
        $start_time = $row[6];
        $end_time = $row[7];

        $checkJadwal = Jadwal::where('matkul_id', $matkul_id)->where('class', $class)->where('room', $room)->where('lecture', $lecture)->where('day', $day)->where('start_time', $start_time)->where('end_time', $end_time)->first();

        if ($checkJadwal) {
            $checkJadwal->update([
                'matkul_id' => $matkul_id,
                'class' => $class,
                'room' => $room,
                'lecture' => $lecture,
                'day' => $day,
                'start_time' => $start_time,
                'end_time' => $end_time,
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
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
