<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dattran;

class Datmob extends Model
{
    use HasFactory;

    protected $table = 'datmobs';

    protected $fillable = [
        'id_mobil',
        'nama',
        'merk',
        'stok',
        'tahun_keluaran',
        'harga'
    ];

    // Define relationship to transaction
    public function transactions()
    {
        return $this->hasMany(Dattran::class, 'id_mobil', 'id_mobil');
    }
}
