<?php

namespace App\Exports;

use App\Models\Dattran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DattranExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    public function collection()
    {
        return Dattran::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID_MK',
            'ID_Mobil',
            'Nama Mobil',
            'Jumlah',
            'Jenis Diskon',
            'Diskon',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Harga',
        ];
    }

    public function map($dattran): array
    {
        return [
            $dattran->id,
            $dattran->id_mk,
            $dattran->id_mobil,
            $dattran->mobil->nama,
            $dattran->jumlah,
            $dattran->jenis_diskon,
            $dattran->diskon,
            $dattran->tgl_pinjam,
            $dattran->tgl_kembali,
            $dattran->harga,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Total harga
                $total = Dattran::sum('harga');
                
                // Append the total row
                $event->sheet->appendRows([
                    ['', '', '', '', '', '', '', '', 'Total Transaksi:', $total]
                ], $event);
    
                // Get the highest row and column to set the border for the entire range
                $highestRow = $event->sheet->getHighestRow(); // Get the number of rows
                $highestColumn = $event->sheet->getHighestColumn(); // Get the letter of the last column
    
                // Apply borders to the whole table
                $cellRange = 'A1:' . $highestColumn . $highestRow; // Define the cell range (A1:F{lastRow})
                $event->sheet->getStyle($cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ]);
    
                // Apply bold to the heading (first row)
                $event->sheet->getStyle('A1:J1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
    
                // Apply bold to the total row (entire row)
                $event->sheet->getStyle('I' . $highestRow . ':J' . $highestRow)->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
            },
        ];
    }
}
