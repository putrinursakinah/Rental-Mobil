@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('datmob.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="nama" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" name="nama" value="{{$editpanitia->nama}}" required>
                                <!-- <option selected>Pilih</option>
                                <option value="Tim">Tim</option>
                                <option value="Individu">Individu</option>
                            </select> -->
                        </div>
                        <div class="col">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control" name="merk" value="{{$editpanitia->alamat}}" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="tahun_keluaran" class="form-label">Tahun Keluaran</label>
                            <input type="text" class="form-control" name="tahun_keluaran" value="{{$editpanitia->nuptk}}" required>
                        </div>
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" value="{{$editpanitia->status_kepegawaian}}" required>
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

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 10,
        multiple:true,
});
</script>
@endpush