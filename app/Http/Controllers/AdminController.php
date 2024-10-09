<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datmob;
use App\Models\Dattran;
use App\Models\Datpen;
use App\Models\Users;

class AdminController extends Controller
{
    public function getTotalcars()
    {
        $totalStok = Datmob::sum('stok');
        $mobil = $totalStok;
        return view('dashboard', compact('mobil'));
    }

    public function getTotalTransaksi()
    {
        $revenue = Dattran::sum('harga');

        return view('dashboard', compact('revenue'));
    }

    public function getTotalPenyewa()
    {
        $tenant = Datpen::count();

        return view('dashboard', compact('tenant'));
    }

    public function getTotalUser()
    {
        $user = Users::count();

        return view('dashboard', compact('user'));
    }
}
