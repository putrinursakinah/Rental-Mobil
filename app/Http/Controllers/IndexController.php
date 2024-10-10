<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Datmob;
use App\Models\Dattran;
use App\Models\Datpen;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {
        $totalStok = Datmob::sum('stok');
        $mobil = $totalStok;

        $totalPenjualan = Dattran::sum('harga');
        $total = $totalPenjualan;

        $totalPenyewa = Datpen::count('id_mk');
        $penyewa = $totalPenyewa;

        $totalUser = Users::count('id');
        $user = $totalUser;

        return view('admin.index', compact('mobil', 'total', 'penyewa', 'user'));
    }
}

   
