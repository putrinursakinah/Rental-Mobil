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
        if (Auth::user()->id == '1') {
            $data = Datpen::all();
            return view('backend.datpen.view_datpen', ['data' => $data]);
        } else {
            $user = Auth::user()->id;
            $data = Datpen::all();
            return view('backend.datpen.view_datpen2', ['data' => $data]);
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
        // Cek jumlah transaksi sebelumnya
        $jumlahTransaksi = Datpen::where('nama', $request->nama)->count();

        $diskon = 0;

        // Logika untuk Diskon Banyak Transaksi
        if ($request->jenis_diskon == 'transaksi') {
            if ($jumlahTransaksi >= 10) {
                $diskon = $request->diskon;
            } else {
                return redirect()->back()->with('error', 'Diskon Banyak Transaksi hanya berlaku untuk penyewa dengan 10 atau lebih transaksi.');
            }
        }
        // Logika untuk Diskon dari Toko
        else if ($request->jenis_diskon == 'toko') {
            $diskon = $request->diskon;
        }

        $data = new Datpen();
        $data->id_mk = $request->id_mk;
        $data->id_mobil = $request->id_mobil;
        $data->nama = $request->nama;
        $data->notelp = $request->notelp;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->merk_mobil = $request->merk_mobil;
        $data->jumlah = $request->jumlah;
        $data->diskon = $diskon; // Simpan diskon ke dalam database
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_selesai = $request->tgl_selesai;
        $data->save();

        return redirect()->route('datpen.view')->with('message', 'Data Berhasil Ditambahkan');
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
        $editpanitia = Datpen::find($id);
        $editanggota = Anggota::find($id);
        return view('backend.datpen.edit_datpen', compact('editpanitia', 'editanggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Datpen::find($id);
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->notelp = $request->notelp;
        $data->alamat = $request->alamat;
        $data->merk_mobil = $request->merk_mobil;
        $data->jumlah = $request->jumlah;
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_selesai = $request->tgl_selesai;
        $data->update();

        foreach ($request->penyewa as $key => $penyewas) {
            $datapen = new Anggota;
            $datapen->user_id = $penyewas;
            $datapen->datpens_id = $data->id;
            $datapen->update();
        }
        return redirect()->route('datpen.view');
    }

    public function editbuktidatpen($id)
    {
        $databukti = Datpen::find($id);
        $dataguru = Anggota::find($id);
        return view('backend.datpen.bukti_datpen', compact('databukti', 'dataguru'));
    }

    public function updatebuktidatpen(Request $request, $id)
    {
        $data = Datpen::find($id);

        $data->email = $request->email;
        $data->notelp = $request->notelp;
        $data->alamat = $request->alamat;
        $data->merk_mobil = $request->merk_mobil;
        $data->jumlah = $request->jumlah;
        $data->save();

        return redirect()->route('datpen.view')->with('message', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Datpen::find($id);
        $deleteData->delete();
        //return redirect()->route('datpen.view');
        return redirect()->route('datpen.view')->with('message', 'Data Berhasil Dihapus');
    }
}
