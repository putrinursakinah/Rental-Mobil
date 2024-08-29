<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    public function datmobs()
    {
        return $this->hasMany(Datmob::class);
    }

    public function dattrans()
    {
        return $this->hasMany(Dattran::class);
    }

    public function datpens()
    {
        return $this->hasMany(Datpen::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
