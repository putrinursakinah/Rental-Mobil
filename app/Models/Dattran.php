<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datmob;

class Dattran extends Model
{
    use HasFactory;
    protected $table = 'dattrans';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_mk',
        'id_mobil',
        'nama_mobil',
        'jumlah',
        'jenis_diskon',
        'diskon',
        'tgl_pinjam',
        'tgl_kembali',
        'harga'
    ];

    public function details()
    {
        return $this->hasMany(Anggota::class, 'id_anggota', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

     // Define inverse relationship to mobil
    public function mobil()
    {
        return $this->belongsTo(Datmob::class, 'id_mobil', 'id_mobil');
    }
}
