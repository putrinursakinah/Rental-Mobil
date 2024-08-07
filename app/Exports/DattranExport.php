<?php

namespace App\Exports;

use App\Models\Dattran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DattranExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Dattran::all();
    }

    /**
     * @return array
     */
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
}
