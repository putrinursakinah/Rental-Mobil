@extends('admin.admin_master')
@section('title','Data Transaksi')
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
                <a href="{{ route('dattran.export') }}" class="btn btn-success">
                    <i class="fas fa-file-export"></i> <!-- Font Awesome export icon -->
                </a>
                <a href="{{route('dattran.add')}}">
                    <button type="button" class="btn btn-primary">Tambah Data</button>
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th><center>ID_MK</center></th>
                            <th><center>ID_Mobil</center></th>
                            <th><center>Nama Mobil</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Jenis Diskon</center></th>
                            <th><center>Diskon</center></th>
                            <th><center>Tanggal Pinjam</center></th>
                            <th><center>Tanggal Kembali</center></th>
                            <th><center>Harga</center></th>
                            <th style="width: 100px;"><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item => $dattran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dattran->id_mk }}</td>
                            <td>{{ $dattran->id_mobil }}</td>
                            <td>{{ $dattran->mobil->nama }} - {{ $dattran->mobil->merk }}</td> <!-- Menampilkan Nama Mobil -->
                            <td>{{ $dattran->jumlah }}</td>
                            <td>{{ $dattran->jenis_diskon }}</td>
                            <td>{{ $dattran->diskon }}</td>
                            <td>{{ $dattran->tgl_pinjam }}</td>
                            <td>{{ $dattran->tgl_kembali }}</td>
                            <td>Rp {{ number_format($dattran->harga, 0, ',', '.') }}</td>
                            <td><center>
                                <a href="{{ route('buktidattran.edit', $dattran->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"> Edit</i></a>
                                <a href="{{ route('dattran.delete', $dattran->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"> Delete</i></a>
                            </center></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9" class="text-center"><strong>Total Semua Transaksi:</strong></td>
                            <td colspan="2"><strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
