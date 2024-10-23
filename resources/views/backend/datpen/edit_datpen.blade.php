@extends('admin.admin_master')
@section('title','Edit Data Penyewa')
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
                <h1 class="h3 mb-2 text-gray-800">Edit Data Penyewa</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('datpen.update', $editpanitia->id) }}" enctype="multipart/form-data">
                @csrf
                {{-- <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="id_mk" class="form-label">ID_MK</label>
                            <input type="text" class="form-control" name="id_mk" value="{{ $editpanitia->id_mk }}" required>
                        </div>
                        <div class="col">
                            <label for="id_mobil" class="form-label">ID_Mobil</label>
                            <input type="text" class="form-control" name="id_mobil" value="{{ $editpanitia->id_mobil }}" required>
                        </div>
                    </div>
                </div> --}}
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="id_penyewa" class="form-label">ID_Penyewa</label>
                            <input type="text" class="form-control" name="id_penyewa" value="{{$editpanitia->id_penyewa}}" required>
                        </div>
                        <div class="col">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$editpanitia->nama}}" required>
                        </div>
                        <div class="col">
                            <label for="notelp" class="form-label">No Telpon</label>
                            <input type="text" class="form-control" name="notelp" value="{{$editpanitia->notelp}}" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$editpanitia->email}}" required>
                        </div>
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$editpanitia->alamat}}" required>
                        </div>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="merk_mobil" class="form-label">Merk Mobil</label>
                            <input type="text" class="form-control" name="merk_mobil" value="{{$editpanitia->merk_mobil}}" required>
                        </div>
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" value="{{$editpanitia->jumlah}}" required>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="jenis_diskon" class="form-label">Jenis Diskon</label>
                            <select class="form-control" name="jenis_diskon" value="{{ $editpanitia->jenis_diskon }}" required>
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="transaksi">Diskon Banyak Transaksi</option>
                                <option value="toko">Diskon dari Toko</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="diskon" class="form-label">Diskon (%)</label>
                            <input type="number" class="form-control" name="diskon" min="0" max="100" value="{{ $editpanitia->diskon }}" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" value="{{$editpanitia->tgl_pinjam}}" required>
                        </div>
                        <div class="col">
                            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" name="tgl_selesai" value="{{$editpanitia->tgl_selesai}}" required>
                        </div>
                    </div>
                </div>   --}}
            <button type="submit" class="btn btn-success">Update</button>
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