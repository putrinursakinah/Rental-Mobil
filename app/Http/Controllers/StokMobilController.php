<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
