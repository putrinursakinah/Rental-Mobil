<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datmob;
use App\Models\Dattran;
use App\Models\Datpen;
use App\Models\Users;

class AdminController extends Controller
{
    public function index()
    {
        $data['datmob'] = Datmob::all();
        $data['dattran'] = Dattran::all();
        $data['datpen'] = Datpen::all();
        $data['user'] = Users::all();
    }
    
}
