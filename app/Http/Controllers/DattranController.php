<?php

namespace App\Http\Controllers;
use App\Exports\DattranExport;
use App\Models\Anggota;
use App\Models\Datpen;
use App\Models\Datmob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dattran;
use Maatwebsite\Excel\Facades\Excel;

class DattranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->id=='1'){

            // Include mobil data using eager loading
            $data = Dattran::with('mobil')->get();
            $totalHarga = Dattran::sum('harga');  // Menghitung total transaksi
            return view('backend.dattran.view_dattran', ['data' => $data, 'totalHarga' => $totalHarga]);
    } else {
        $user = Auth::user()->id;
        $data = Dattran::with('mobil')->get();
        $totalHarga = Dattran::sum('harga');
        return view('backend.dattran.view_dattran2', ['data' => $data, 'totalHarga' => $totalHarga]);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penyewa = Datpen::all(); // Mengambil data penyewa
        $mobil = Datmob::all(); // Mengambil data mobil
        return view('backend.dattran.add_dattran', compact('penyewa', 'mobil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request untuk memastikan 'id_mobil' ada
        $request->validate([
            'id_mobil' => 'required|exists:datmobs,id_mobil',  // Pastikan mobil ada
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric',
        ]);
        
        // Cari mobil yang dipilih berdasarkan ID
        $mobil = Datmob::where('id_mobil', $request->id_mobil)->first();
        
        // Cek apakah mobil ditemukan
        if (!$mobil) {
            return redirect()->back()->with('error', 'Mobil tidak ditemukan.');
        }

        // Cek apakah stok mencukupi
        if ($mobil->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok mobil tidak mencukupi.');
        }

        // Buat transaksi baru
        $transaksi = new Dattran();
        $transaksi->id_mk = $request->id_mk;
        $transaksi->id_mobil = $mobil->id_mobil;
        $transaksi->nama_mobil = $mobil->nama;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->jenis_diskon = $request->jenis_diskon;
        $transaksi->diskon = $request->diskon;
        $transaksi->tgl_pinjam = $request->tgl_pinjam;
        $transaksi->tgl_kembali = $request->tgl_kembali;
        $transaksi->harga = $request->harga;
        $transaksi->save();

        // Kurangi stok mobil
        $mobil->stok -= $request->jumlah;
        $mobil->save();

        return redirect()->route('dattran.view')->with('message', 'Transaksi berhasil ditambahkan dan stok diperbarui.');
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
        $editpanitia = Dattran::find($id); // Transaksi yang akan diedit
        $penyewa = Datpen::all(); // Data penyewa
        $mobil = Datmob::all(); // Data mobil
        $editanggota = Anggota::find($id);
        return view('backend.dattran.edit_dattran', compact('editpanitia', 'penyewa', 'mobil', 'editanggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'id_mobil' => 'required|exists:datmobs,id_mobil',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric',
        ]);

        // Ambil data transaksi lama
        $transaksi = Dattran::find($id);
        $mobil = Datmob::where('id_mobil', $request->id_mobil)->first();

        if (!$mobil) {
            return redirect()->back()->with('error', 'Mobil tidak ditemukan.');
        }

        // Cek stok, jika jumlah yang baru berbeda dengan yang lama
        if ($mobil->stok + $transaksi->jumlah < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok mobil tidak mencukupi.');
        }

        // update transaksi
        $transaksi = Dattran::find($id);
        $transaksi->id_mk = $request->id_mk;
        $transaksi->id_mobil = $mobil->id_mobil;
        $transaksi->nama_mobil = $mobil->nama;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->jenis_diskon = $request->jenis_diskon;
        $transaksi->diskon = $request->diskon;
        $transaksi->tgl_pinjam = $request->tgl_pinjam;
        $transaksi->tgl_kembali = $request->tgl_kembali;
        $transaksi->harga = $request->harga;
        $transaksi->update();

        // Update stok mobil
        $mobil->stok = ($mobil->stok + $transaksi->jumlah) - $request->jumlah;
        $mobil->save();

        return redirect()->route('dattran.view')->with('message', 'Transaksi berhasil diperbarui dan stok diperbarui.');
    }

    public function editbuktidattran($id){
        $databukti = Dattran::find($id); // Ambil data transaksi berdasarkan ID
        $penyewa = Datpen::all(); // Data penyewa (jika perlu ditampilkan)
        $mobil = Datmob::all(); // ambil data mobil
        $dataguru = Anggota::find($id);
        return view('backend.dattran.bukti_dattran', compact('databukti', 'penyewa', 'mobil', 'dataguru'));
}

    public function updatebuktidattran(Request $request, $id)
    {
        // Validasi tanggal
    $request->validate([
        'tgl_pinjam' => 'required|date',
        'tgl_kembali' => 'required|date|after:tgl_pinjam',
    ]);

    // Update data transaksi
    $transaksi = Dattran::find($id);
    $transaksi->tgl_pinjam = $request->tgl_pinjam;
    $transaksi->tgl_kembali = $request->tgl_kembali;
    $transaksi->save();

    return redirect()->route('dattran.view')->with('message', 'Data transaksi berhasil diperbarui.');
}

    public function destroy(string $id)
    {
        $deleteData = Dattran::find($id);
        $deleteData->delete();
        return redirect()->route('dattran.view')->with('message', 'Data Berhasil Dihapus');
    }

    public function export()
    {
        return Excel::download(new DattranExport, 'transaksi.xlsx');
    }
}
