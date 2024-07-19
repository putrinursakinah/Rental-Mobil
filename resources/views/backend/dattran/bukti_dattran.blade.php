@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Update Data Transaksi</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
        <form method="POST" action="{{ route('bukti.update', $databukti->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama" value="{{$databukti->nama}}" disabled>
                        </div>
                        <div class="col">
                            <label for="merk" class="form-label">Merk Mobil</label>
                            <input type="text" class="form-control" name="merk" value="{{$databukti->merk}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" value="{{$databukti->tgl_pinjam}}">
                        </div>
                        <div class="col">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="datetime-local" class="form-control" name="tgl_kembali" value="{{$databukti->tgl_kembali}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="harga" class="form-label">Harga Sewa</label>
                            <input type="text" class="form-control" name="harga" value="{{$databukti->harga}}" disabled>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button onclick="history.back()" type="button" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection