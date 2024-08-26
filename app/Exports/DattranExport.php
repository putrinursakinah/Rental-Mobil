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
            'Nama',
            'Merk',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Harga',
        ];
    }

    public function map($dattran): array
    {
        return [
            $dattran->id,
            $dattran->nama,
            $dattran->merk,
            $dattran->tgl_pinjam,
            $dattran->tgl_kembali,
            $dattran->harga,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $total = Dattran::sum('harga');
                $event->sheet->appendRows([
                    ['', '', '', '', 'Total Transaksi:', $total]
                ], $event);
            },
        ];
    }
}
