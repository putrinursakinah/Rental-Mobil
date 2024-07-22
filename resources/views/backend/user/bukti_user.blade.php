@extends('admin.admin_master')
@section('title',' Edit User')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Update User</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
        <form method="POST" action="{{ route('buktiuser.update', $databukti->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$databukti->name}}" disabled>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$databukti->email}}" disabled>
                        </div>
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{$databukti->password}}">
                        </div>
                    </div>
                </div>
                <!-- <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="tahun_keluaran" class="form-label">Tahun Keluaran</label>
                            <input type="text" class="form-control" name="tahun_keluaran">
                        </div> -->
                        <!-- <div class="col">
                            <label for="file" class="form-label">Unggah File</label>
                            <input type="file" class="form-control-file" name="file">
                        </div> -->
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button onclick="history.back()" type="button" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection