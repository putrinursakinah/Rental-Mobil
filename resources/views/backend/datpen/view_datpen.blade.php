@extends('admin.admin_master')
@section('title','Data Penyewa')
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
                <h1 class="h3 mb-2 text-gray-800">Data Penyewa</h1>
            </div>
            
            

            <div class="co text-end mb-2">
                <a href="{{route('datpen.add')}}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
            </div>
        </div>
    </div>
    
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <a href="{{route('datpen.add')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Merk Mobil</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Selesai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        {{-- <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr> --}}
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $item => $datpen)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $datpen->nama }}</td>
                                <td>{{ $datpen->notelp }}</td>
                                <td>{{ $datpen->email }}</td>
                                <td>{{ $datpen->alamat }}</td>
                                <td>{{ $datpen->merk_mobil }}</td>
                                <td>{{ $datpen->tgl_pinjam }}</td>
                                <td>{{ $datpen->tgl_selesai }}</td>
                                <td>
                                    <a href="{{route('buktidatpen.edit', $datpen->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"> Edit</i></a>
                                    <a href="{{route('datpen.delete', $datpen->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"> Delete</i></a>
                                </td>
                            </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection