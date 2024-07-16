@extends('admin.admin_master')
@section('title','Data Mobil')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Mobil</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('datmob.add')}}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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
                            <th><center>Nama Mobil</center></th>
                            <th><center>Merk</center></th>
                            <th><center>Tahun Keluaran</center></th>
                            <th><center>Harga Sewa</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>

                        @foreach ($data as $item =>$datmob)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$datmob->nama}}</td>
                            <td>{{$datmob->merk}}</td>
                            <td>{{$datmob->tahun_keluaran}}</td>
                            <td>{{$datmob->harga}}</td>
                            <!-- <td>{{$datmob->gambar}}</td> -->
                            <td><center>
                                <a href="{{route('bukti.edit', $datmob->id)}}"><button type="button" class="btn"><i class="fa fa-upload"></i></button></a>
                                
                                <a href="{{route('datmob.delete', $datmob->id)}}" id="delete" class="btn"><i class="fa fa-trash-o"></i></a>
                                </center>
                            </td>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection