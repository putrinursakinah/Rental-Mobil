@extends('admin.admin_master')
@section('title','Data Transaksi2')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('dattran.add')}}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>

                        @foreach ($data as $item =>$dattran)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dattran->nama}}</td>
                            <td>{{$dattran->merk}}</td>
                            <td>{{$dattran->tgl_pinjam}}</td>
                            <td>{{$dattran->tgl_kembali}}</td>
                            <td>{{$dattran->harga}}</td>
                            <td><center>
                                <a href="{{route('bukti.edit', $dattran->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"> Edit</i></a>
                                <a href="{{route('dattran.delete', $dattran->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"> Delete</i></a>
                                </center>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection