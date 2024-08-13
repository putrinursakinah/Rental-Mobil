@extends('admin.admin_master')
@section('title','Tambah Stok Mobil')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Tambah Stok Mobil</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('stokmobil.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="id_mm" class="form-label">ID_MM</label>
                            <input type="text" class="form-control" name="id_mm" required>
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
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="datetime-local" class="form-control" name="tanggal_masuk" required>
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="datetime-local" class="form-control" name="jumlah" required>
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