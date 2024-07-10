<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datmob extends Model
{
    use HasFactory;
    protected $table = 'datmobs';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function details()
    {
        return $this->hasMany(Anggota::class, 'id_anggota', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
