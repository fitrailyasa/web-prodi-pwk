<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class EventExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $collection = [];

        $no = 1;
        $Events = Event::all();

        foreach ($Events as $Event) {
            $collection[] = [
                'No' => $no++,
                'Judul Event' => $Event->name ?? '',
                'Konten Event' => $Event->desc ?? '',
                'Status' => $Event->status ?? '',
                'Tanggal Pelaksanaan' => $this->formatDate($Event->event_date),
                'Tanggal Publikasi' => $this->formatDate($Event->publish_date),
                'Tag Event' => $Event->tag->name ?? '',
            ];
        }

        array_unshift($collection, ['Data Event'], ['']);

        return collect($collection);
    }

    public function headings(): array
    {
        return [
            [''],
            [
                'No',
                'Judul Event',
                'Isi Event',
                'Status',
                'Tanggal Pelaksanaan',
                'Tanggal Publikasi',
                'Tag Event',
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
