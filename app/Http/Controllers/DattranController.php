<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Models\Dattran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DattranController extends Controller
{
    public function index()
    {
        if (Auth::user()->id=='1'){
            $data = Dattran::all();
            return view('backend.dattran.index', ['data' => $data]);
    } else {
        $user = Auth::user()->id;
        $data = Anggota::where('user_id', $user)->get();
        return view('backend.dattran.index', ['data' => $data]);
    }
}
    public function create()
    {
        $anggota = DB::table("users")->get();
        return view('backend.dattran.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $data = new Dattran();
        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->mobil = $request->mobil;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('dattran.view');

        // $request->validate([
        //     'nama_pelanggan' => 'required',
        //     'mobil' => 'required',
        //     'tanggal_pinjam' => 'required|date',
        //     'tanggal_kembali' => 'required|date',
        //     'harga' => 'required|numeric',
        // ]);

        // Dattran::create($request->all());

        // return redirect()->route('dattran.index')
        //                  ->with('success', 'Transaksi created successfully.');
    }

    public function show(Dattran $transaksi)
    {
        return view('dattran.show', compact('dattran'));
    }

    public function edit(Dattran $transaksi)
    {
        return view('dattran.edit', compact('dattran'));
    }

    public function update(Request $request, Dattran $dattran)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'mobil' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'harga' => 'required|numeric',
        ]);

        $dattran->update($request->all());

        return redirect()->route('dattran.index')
                         ->with('success', 'Transaksi updated successfully.');
    }

    public function destroy(string $id)
    {
        $deleteData = Dattran::find($id);
        $deleteData->delete();
        return redirect()->route('dattran.view');
        // $dattran->delete();

        // return redirect()->route('dattran.view')
        //                  ->with('success', 'Transaksi deleted successfully.');
    }
}
