<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dattran extends Model
{
    use HasFactory;
    protected $table = 'dattrans';
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
