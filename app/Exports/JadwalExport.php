<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;

class JadwalExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];

        $no = 1;
        $Jadwals = Jadwal::all();

        foreach ($Jadwals as $Jadwal) {
            $collection[] = [
                'No' => $no++,
                'Matkul' => $Jadwal->matkul->name ?? '',
                'Kelas' => $Jadwal->class ?? '',
                'Ruangan' => $Jadwal->room ?? '',
                'Dosen' => $Jadwal->lecture ?? '',
                'Hari' => $Jadwal->day ?? '',
                'Waktu' => $Jadwal->start_time . ' - ' . $Jadwal->end_time ?? '',
            ];
        }

        array_unshift($collection, ['Data Jadwal'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                'No',
                'Matkul',
                'Kelas',
                'Ruangan',
                'Dosen',
                'Hari',
                'Waktu',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:G1');

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:D' . $sheet->getHighestRow())
            ->applyFromArray($borderStyle);

        return [
            // Style untuk heading pertama
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], // Putih
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'], // Hitam
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style untuk heading kedua
            2 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], // Putih
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'], // Hitam
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
