@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{ route('dattran.create') }}" class="btn btn-primary">Tambah Transaksi</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Pelanggan</th>
                            <th>Mobil</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Harga</th>
                            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($data as $item =>$dattran)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dattran->nama_pelanggan }}</td>
                    <td>{{ $dattran->mobil }}</td>
                    <td>{{ $dattran->tanggal_pinjam }}</td>
                    <td>{{ $dattran->tanggal_kembali }}</td>
                    <td>{{ $dattran->harga }}</td>
                    <td>
                        {{-- <a href="{{ route('dattran.show', $dattran->id) }}" class="btn btn-info">Lihat</a> --}}
                        <a href="{{ route('dattran.edit', $dattran->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('dattran.delete', $dattran->id) }}" class="btn btn-danger">Hapus</a>
                        {{-- <form action="{{ route('dattran.destroy', $dattran->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
