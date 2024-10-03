<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datmob extends Model
{

    protected $table = 'datmobs';

    protected $fillable = [
        'id_mobil',
        'nama',
        'merk',
        'stok',
        'tahun_keluaran',
        'harga'
    ];
}
