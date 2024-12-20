<?php

namespace App\Imports;

use App\Models\Matkul;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MatkulImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        // Skip rows without a valid 'Hari' (day) or 'Mata Kuliah' (name) value
        if (empty($row[0]) || empty($row[3])) {
            return null;  // Skip rows with missing 'Hari' or 'Mata Kuliah'
        }

        // Extract values based on the export format
        $day = $row[0]; // 'Hari'
        $start_time = $row[1] ?? ''; // 'Waktu Mulai'
        $end_time = $row[2] ?? ''; // 'Waktu Selesai'
        $name = $row[3] ?? ''; // 'Mata Kuliah'
        $credits = $row[4] ?? ''; // 'SKS'
        $class = $row[5] ?? ''; // 'Kelas'
        $lecturer = $row[6] ?? ''; // 'Dosen Pengampu'
        $room = $row[7] ?? ''; // 'Ruang'

        // Get the user_id from the logged-in user
        $user_id = auth()->user()->id;

        // Check if a Matkul already exists with the same day and name
        $checkMatkul = Matkul::where('name', $name)
            ->where('day', $day)  // Ensure we associate with the correct day
            ->first();

        // If Matkul exists, update it
        if ($checkMatkul) {
            $checkMatkul->update([
                'start_time' => $start_time,
                'end_time' => $end_time,
                'credits' => $credits,
                'class' => $class,
                'lecturer' => $lecturer,
                'room' => $room,
                'user_id' => $user_id,
            ]);
            return null;
        } else {
            // If not, create a new Matkul entry
            return new Matkul([
                'day' => $day, // Use the current day value
                'start_time' => $start_time,
                'end_time' => $end_time,
                'name' => $name,  // Ensure this is set
                'credits' => $credits,
                'class' => $class,
                'lecturer' => $lecturer,
                'room' => $room,
                'user_id' => $user_id,
            ]);
        }
    }


    public function startRow(): int
    {
        // Start reading data from row 4 (to skip the header rows)
        return 4;
    }
}
