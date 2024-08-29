<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $datmobs = DB::table('datmobs')->get();
        $dattrans = DB::table('dattrans')->get();
        $datpens = DB::table('datpens')->get();
        $users = DB::table('users')->get();

        return view('dashboard', compact('datmobs', 'dattrans', 'datpens', 'users'));
    }
}
