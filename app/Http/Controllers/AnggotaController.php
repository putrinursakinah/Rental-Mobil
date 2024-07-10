<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Datmob;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function getData(Request $request)
    {
        $data = User::where('name', 'like', '%' . $request->searchItem .  '%');
        return $data->paginate(10, ['*'], 'page', $request->page);
    }

    public function editnilai($id)
    {
        $datakeg = Datmob::find($id);
        $dataguru = Anggota::where('datmobs_id', $id)->get();
        return view('backend.datmob.edit_nilai', compact('datakeg', 'dataguru'));
    }
    
    public function tambahnilai($id)
    {
        $datanama = Anggota::find($id);
        return view('backend.datmob.add_nilai', compact('dataguru'));
    }

    public function updatenilai(Request $request, $id)
    {
        $datanilai = Anggota::find($id);
        $datanilai->nilai = $request->nilai;
        $datanilai->update();
        return back();
    }

}
