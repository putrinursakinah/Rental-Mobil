@extends('admin.admin_master')
@section('title','Tambah Transaksi')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Transaksi</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('dattran.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="col">
                            <label for="merk" class="form-label">Merk Mobil</label>
                            <input type="text" class="form-control" name="merk" required>
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
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="datetime-local" class="form-control" name="tgl_kembali" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" required>
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
        multiple:true,
});
</script>
@endpush