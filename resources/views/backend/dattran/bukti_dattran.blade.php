@extends('admin.admin_master')
@section('title', 'Edit Penyewa')
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
            <form method="POST" action="{{ route('buktidattran.update', $databukti->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="id_mk" class="form-label">ID MK</label>
                            <input type="text" class="form-control" name="id_mk" value="{{ $databukti->id_mk }}">
                        </div>
                        <div class="col">
                            <label for="id_mobil" class="form-label">ID Mobil</label>
                            <input type="text" class="form-control" name="id_mobil" value="{{ $databukti->id_mobil }}">
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" value="{{ $databukti->jumlah }}">
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <div class="row">
                        <div class="col">
                            <label for="jenis_diskon" class="form-label">Jenis Diskon</label>
                            <select class="form-control" name="jenis_diskon">
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="transaksi" {{ $databukti->jenis_diskon == 'transaksi' ? 'selected' : '' }}>Diskon Banyak Transaksi</option>
                                <option value="toko" {{ $databukti->jenis_diskon == 'toko' ? 'selected' : '' }}>Diskon dari Toko</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="diskon" class="form-label">Diskon (%)</label>
                            <input type="number" class="form-control" name="diskon" min="0" max="100" value="{{ $databukti->diskon }}">
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <div class="row">
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" value="{{ $databukti->tgl_pinjam }}">
                        </div>
                        <div class="col">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="datetime-local" class="form-control" name="tgl_kembali" value="{{ $databukti->tgl_kembali }}">
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <div class="row">
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" value="{{ $databukti->harga }}" disabled>
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
