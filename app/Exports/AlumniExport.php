<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;

class AlumniExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];

        $no = 1;
        $Alumnis = Alumni::all();

        foreach ($Alumnis as $Alumni) {
            $collection[] = [
                'No' => $no++,
                'Nama' => $Alumni->name ?? '',
                'Tahun Masuk' => $Alumni->class_year ?? '',
                'Tahun Lulus' => $Alumni->graduation_year ?? '',
                'Pekerjaan' => $Alumni->work ?? '',
                'Perusahaan' => $Alumni->company ?? '',
            ];
        }

        array_unshift($collection, ['Data Alumni'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                'No',
                'Nama',
                'Tahun Masuk',
                'Tahun Lulus',
                'Pekerjaan',
                'Perusahaan',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:F1');

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
