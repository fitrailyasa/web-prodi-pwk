<?php

namespace App\Exports;

use App\Models\Matkul;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class MatkulExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];

        $no = 1;
        $matkuls = Matkul::all();

        foreach ($matkuls as $matkul) {
            $collection[] = [
                'No' => $no++,
                'Nama Matkul' => $matkul->name ?? '',
                'Kode Matkul' => $matkul->code ?? '',
                'Jumlah SKS' => $matkul->credits ?? '',
                'Semester' => $matkul->semester ?? '',
            ];
        }

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            ['Data Mata Kuliah'], // Judul di baris 1
            [ // Header kolom di baris 2
                'No',
                'Nama Matkul',
                'Kode Matkul',
                'Jumlah SKS',
                'Semester',
            ],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Merge title "Data Mata Kuliah"
        $sheet->mergeCells('A1:E1');

        // Border semua data
        $sheet->getStyle('A1:E' . $sheet->getHighestRow())
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ]);

        return [
            // Style untuk title
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 14,
                    'color' => ['argb' => 'FFFFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
            // Style untuk header kolom
            2 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF000000'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ];
    }
}
