<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datpen extends Model
{
    use HasFactory;
    protected $table = 'datpens';
    
    protected $fillable = [
        'id_mk',
        'id_mobil',
        'nama',
        'notlp',
        'email',
        'alamat',
        'merk_mobil',
        'jumlah',
        'jenis_diskon',
        'diskon',
        'tgl_pinjam',
        'tgl_selesai'
    ];
    public $timestamps = true;
    public function details()
    {
        return $this->hasMany(Anggota::class, 'id_anggota', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
