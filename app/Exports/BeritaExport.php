<?php

namespace App\Exports;

use App\Models\Berita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class BeritaExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];

        $no = 1;
        $Beritas = Berita::all();

        foreach ($Beritas as $Berita) {
            $collection[] = [
                'No' => $no++,
                'Judul Berita' => $Berita->name ?? '',
                'Konten Berita' => $Berita->desc ?? '',
                'Status' => $Berita->status ?? '',
                'Tanggal Pelaksanaan' => $this->formatDate($Berita->event_date),
                'Tanggal Publikasi' => $this->formatDate($Berita->publish_date),
                'Tag Berita' => $Berita->tag->name ?? '',
            ];
        }

        array_unshift($collection, ['Data Berita'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                'No',
                'Judul Berita',
                'Isi Berita',
                'Status',
                'Tanggal Pelaksanaan',
                'Tanggal Publikasi',
                'Tag Berita',
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

        $sheet->getStyle('A1:G' . $sheet->getHighestRow())
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

    private function formatDate($date)
    {
        if (!$date) {
            return '';
        }

        try {
            return Carbon::parse($date)->format('d/m/Y');
        } catch (\Exception $e) {
            return '';
        }
    }
}
