@extends('admin.admin_master')
@section('title',' Tambah Penyewa')
@section('admin')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800"> Tambah Penyewa</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('datpen.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="id_mk" class="form-label">ID_MK</label>
                            <input type="text" class="form-control" name="id_mk" required>
                        </div>
                        <div class="col">
                            <label for="id_mobil" class="form-label">ID_Mobil</label>
                            <input type="text" class="form-control" name="id_mobil" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="col">
                            <label for="notelp" class="form-label">No Telpon</label>
                            <input type="text" class="form-control" name="notelp" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="merk_mobil" class="form-label">Merk Mobil</label>
                            <input type="text" class="form-control" name="merk_mobil" required>
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="jenis_diskon" class="form-label">Jenis Diskon</label>
                            <select class="form-control" name="jenis_diskon" required>
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="transaksi">Diskon Banyak Transaksi</option>
                                <option value="toko">Diskon dari Toko</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="diskon" class="form-label">Diskon (%)</label>
                            <input type="number" class="form-control" name="diskon" min="0" max="100" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" required>
                        </div>
                        <div class="col">
                            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" name="tgl_selesai" required>
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

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 10,
        multiple: true,
    });
</script>
@endpush