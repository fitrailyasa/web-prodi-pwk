<?php

namespace App\Exports;

use App\Models\Matkul;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;

class MatkulExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];
        $Matkuls = Matkul::all();

        // Urutkan data berdasarkan hari (Senin, Selasa, dll)
        $daysOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        // Mengelompokkan data berdasarkan 'day' (hari)
        $groupedMatkuls = $Matkuls->groupBy('day');

        // Urutkan hari sesuai urutan yang diinginkan
        foreach ($daysOrder as $day) {
            if ($groupedMatkuls->has($day)) {
                // Menambahkan hari ke baris pertama untuk setiap grup
                $collection[] = [
                    'ID' => '',
                    'Nama' => '',
                    'Kode' => '',
                    'SKS' => '',
                    'Semester' => '',
                    'Dosen' => '',
                ];

                // Menambahkan mata kuliah di bawahnya
                foreach ($groupedMatkuls->get($day) as $Matkul) {
                    $collection[] = [
                        'ID' => $Matkul->id,
                        'Nama' => $Matkul->name,
                        'Kode' => $Matkul->code,
                        'SKS' => $Matkul->credits,
                        'Semester' => $Matkul->semester,
                        'Dosen' => $Matkul->dosen->name,
                    ];
                }
            }
        }

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            ['Data Jadwal Mata Kuliah'], // Judul Utama
            [''],
            [
                'ID',
                'Nama',
                'Kode',
                'SKS',
                'Semester',
                'Dosen',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Merge sel untuk judul utama
        $sheet->mergeCells('A1:F1');

        // Style border tipis
        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        // Atur border untuk seluruh data
        $sheet->getStyle('A1:H' . $sheet->getHighestRow())
            ->applyFromArray($borderStyle);

        return [
            // Style untuk Judul Utama
            1 => [
                'font' => ['bold' => true, 'size' => 14, 'color' => ['argb' => 'FFFFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style untuk Header Tabel
            3 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style untuk baris yang berisi hari
            'A4:A' . $sheet->getHighestRow() => [
                'font' => ['bold' => true, 'size' => 12],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FFDDDDDD'], // Latar abu-abu terang
                ],
            ],
        ];
    }
}
