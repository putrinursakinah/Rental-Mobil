<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dattran;

class DattranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->id=='1'){
            $data = Dattran::all();
            return view('backend.dattran.view_dattran', ['data' => $data]);
    } else {
        $user = Auth::user()->id;
        $data = Dattran::all();
        return view('backend.dattran.view_dattran2', ['data' => $data]);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.dattran.add_dattran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Dattran();
        $data->nama = $request->nama;
        $data->merk = $request->merk;
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_kembali = $request->tgl_kembali;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('dattran.view');
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
        $editpanitia = Dattran::find($id);
        $editanggota = Anggota::find($id);
        return view('backend.dattran.edit_dattran', compact('editpanitia', 'editanggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Dattran::find($id);
        $data->nama = $request->nama;
        $data->merk = $request->merk;
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_kembali = $request->tgl_kembali;
        $data->harga = $request->harga;
        $data->update();

        foreach ($request->transaksi as $key => $transaksis) {
            $dataTransaksi = new Anggota;
            $dataTransaksi -> user_id = $transaksis;
            $dataTransaksi -> dattrans_id = $data->id;
            $dataTransaksi->update();
    }
    return redirect()->route('dattran.view');
}

    public function editbukti($id){
        $databukti = Dattran::find($id);
        $dataguru = Anggota::find($id);
        return view('backend.dattran.bukti_dattran', compact('databukti', 'dataguru'));
}

    public function updatebukti(Request $request, $id){
        $data = Dattran::find($id);
        $data->tgl_pinjam = $request->tgl_pinjam;
        $data->tgl_kembali = $request->tgl_kembali;
        $data->save();
        return redirect()->route('dattran.view');
    }

    public function destroy(string $id)
    {
        $deleteData = Dattran::find($id);
        $deleteData->delete();
        return redirect()->route('dattran.view');
    }
}
