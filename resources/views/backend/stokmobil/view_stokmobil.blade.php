@extends('admin.admin_master')
@section('title','Stok Mobil')
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
                <h1 class="h3 mb-2 text-gray-800">Stok Mobil</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('stokmobil.add')}}">
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
                            <th><center>ID_MM</center></th>
                            <th><center>ID_Mobil</center></th>
                            <th><center>Tanggal Masuk</center></th>
                            <th><center>Jumlah</center></th>
                        </tr>
                    </thead>

                    @foreach ($data as $item => $stokmobil)
                        <tr>
                            <td>{{$dattran->id_mm}}</td>
                            <td>{{$dattran->id_mobil}}</td>
                            <td>{{$dattran->tanggal_masuk}}</td>
                            <td>{{$dattran->jumlah}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection
