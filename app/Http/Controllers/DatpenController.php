<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Datpen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatpenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->id=='1'){
            $data = Datpen::all();
            return view('backend.datpen.view_datpen', ['data' => $data]);
    } else {
        $user = Auth::user()->id;
        $data = Anggota::where('user_id', $user)->get();
        return view('backend.datpen.view_datpen', ['data' => $data]);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = DB::table('users')->get();
        return view('backend.datpen.add_datpen', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Datpen();
        $data->nama = $request->nama;
        $data->notelp = $request->notelp;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->merk_mobil = $request->merk_mobil;
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_selesai = $request->tgl_selesai;
        $data->save();

        return redirect()->route('datpen.view');
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
