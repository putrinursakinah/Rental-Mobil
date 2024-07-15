@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Update Data Penyewa</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
        <form method="POST" action="{{ route('buktidatpen.update', $databukti->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$databukti->nama}}" disabled>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$databukti->email}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="notelp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="notelp" value="{{$databukti->notelp}}">
                        </div>
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$databukti->alamat}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="merk_mobil" class="form-label">Merk Mobil</label>
                            <input type="text" class="form-control" name="merk_mobil" value="{{$databukti->merk_mobil}}">
                        </div>
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" value="{{$databukti->tgl_pinjam}}" disabled>
                        </div>
                        <div class="col">
                            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" name="tgl_selesai" value="{{$databukti->tgl_selesai}}" disabled>
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