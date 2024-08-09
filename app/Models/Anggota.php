<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
