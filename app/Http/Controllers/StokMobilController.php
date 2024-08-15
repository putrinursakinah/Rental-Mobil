<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\StokMobil;
class StokMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StokMobil::all();
        return view('backend.stokmobil.view_stokmobil', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.stokmobil.add_stokmobil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new StokMobil();
        $data->id_mm = $request->id_mm;
        $data->id_mobil = $request->id_mobil;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->jumlah = $request->jumlah;
        $data->save();

        return redirect()->route('stokmobil.view')->with('message', 'Data Berhasil Ditambahkan');
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
        $editpanitia = StokMobil::find($id);
        $editanggota = Anggota::find($id);
        return view('backend.stokmobil.edit_stokmobil', compact('editpanitia', 'editanggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StokMobil::find($id);
        $data->id_mm = $request->id_mm;
        $data->id_mobil = $request->id_mobil;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->jumlah = $request->jumlah;
        $data->update();

        foreach ($request->penyedia as $key => $penyedias) {
            $dataPenyedia = new Anggota;
            $dataPenyedia -> user_id = $penyedias;
            $dataPenyedia -> stok_mobils_id = $data->id;
            $dataPenyedia->update();
    }
    return redirect()->route('stokmobil.view');
    }

    public function editbuktistokmobil($id){
        $databukti = StokMobil::find($id);
        $dataguru = Anggota::find($id);
        return view('backend.stokmobil.bukti_stokmobil', compact('databukti', 'dataguru'));
    }

    public function updatebuktistokmobil(Request $request, $id){
        $data = StokMobil::find($id);
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->save();
        return redirect()->route('dattran.view')->with('message', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = StokMobil::find($id);
        $deleteData->delete();
        return redirect()->route('stokmobil.view')->with('message', 'Data Berhasil Dihapus');
    }
}
