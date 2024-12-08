<?php

namespace App\Exports;

use App\Models\Link;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;

class LinkExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];

        $no = 1;
        $Links = Link::all();

        foreach ($Links as $Link) {
            $collection[] = [
                'No' => $no++,
                'Nama' => $Link->name ?? '',
                'Deskripsi' => $Link->desc ?? '',
                'Tautan' => $Link->link ?? '',
                'Kategori' => $Link->category ?? '',
            ];
        }

        array_unshift($collection, ['Data Link'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                'No',
                'Nama',
                'Deskripsi',
                'Tautan',
                'Kategori',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:D1');

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
