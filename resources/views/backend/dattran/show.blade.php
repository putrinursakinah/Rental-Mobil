@extends('admin.admin_master')
@section('admin')

<div class="container">
    <h1>Detail Transaksi</h1>
    <div>
        <strong>Nama Pelanggan:</strong> {{ $dattran->nama_pelanggan }}
    </div>
    <div>
        <strong>Mobil:</strong> {{ $dattran->mobil }}
    </div>
    <div>
        <strong>Tanggal Pinjam:</strong> {{ $dattran->tanggal_pinjam }}
    </div>
    <div>
        <strong>Tanggal Kembali:</strong> {{ $dattran->tanggal_kembali }}
    </div>
    <div>
        <strong>Harga:</strong> {{ $dattran->harga }}
    </div>
    <a href="{{ route('dattran.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
