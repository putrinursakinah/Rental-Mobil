@extends('admin.admin_master')
@section('title','Data Transaksi2')
@section('admin')

<div class="container-fluid">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{ route('dattran.add') }}">
                    <button type="button" class="btn btn-primary">Tambah Data</button>
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th><center>Nama Pelanggan</center></th>
                            <th><center>Merk Mobil</center></th>
                            <th><center>Tanggal Pinjam</center></th>
                            <th><center>Tanggal Kembali</center></th>
                            <th><center>Harga</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item => $dattran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dattran->nama }}</td>
                            <td>{{ $dattran->merk }}</td>
                            <td>{{ $dattran->tgl_pinjam }}</td>
                            <td>{{ $dattran->tgl_kembali }}</td>
                            <td>Rp {{ number_format($dattran->harga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"><strong>Total Semua Transaksi:</strong></td>
                            <td><strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
