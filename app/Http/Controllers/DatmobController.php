<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Models\Datmob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DatmobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->id=='1'){
            $data = Datmob::all();
            return view('backend.datmob.view_datmob', ['data' => $data]);
      } else {
            $user = Auth::user()->id;
            $data = Datmob::all();
            return view('backend.datmob.view_datmob2', ['data' => $data]);
      }
       
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  $anggota = DB::table('users')->get();
        return view('backend.datmob.add_datmob');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Datmob();
        $data->id_mobil = $request->id_mobil;
        $data->nama = $request->nama;
        $data->merk = $request->merk;
        $data->stok = $request->stok;
        $data->tahun_keluaran = $request->tahun_keluaran;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('datmob.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editpanitia = Datmob::find($id);
        $editanggota = Anggota::find($id);
        return view('backend.datmob.edit_datmob', compact('editpanitia', 'editanggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Datmob::find($id);
        $data->nama = $request->nama;
        $data->merk = $request->merk;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->update();

        foreach ($request->mobil as $key => $mobils) {
            $dataMobil = new Anggota;
            $dataMobil -> user_id = $mobils;
            $dataMobil -> datmobs_id = $data->id;
            $dataMobil->update();
    }
    return redirect()->route('datmob.view');
}

    public function editbukti($id){
        $databukti = Datmob::find($id);
        $dataguru = Anggota::find($id);
        return view('backend.datmob.bukti_datmob', compact('databukti', 'dataguru'));
}

    public function updatebukti(Request $request, $id){
        $data = Datmob::find($id);
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->save();
        return redirect()->route('datmob.view');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Datmob::find($id);
        $deleteData->delete();
        return redirect()->route('datmob.view')->with('message', 'Data Mobil Berhasil Dihapus!');
    }
}
