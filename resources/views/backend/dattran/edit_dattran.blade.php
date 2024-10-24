@extends('admin.admin_master')
@section('title', 'Edit Transaksi')
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
            <form method="POST" action="{{ route('buktidattran.update', $editpanitia->id) }}" enctype="multipart/form-data">
                @csrf

                <!-- ID MK -->
                <div class="mb-2">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="id_mk" class="form-label">ID MK</label>
                            <input type="text" class="form-control" name="id_mk" value="{{ $editpanitia->id_mk }}">
                        </div>

                        <!-- Pilih Mobil -->
                        <div class="col">
                            <label for="id_mobil" class="form-label">Nama Mobil</label>
                            <select name="id_mobil" id="id_mobil" class="form-control" required>
                                <option value="" disabled selected>Pilih Mobil</option>
                                @foreach($mobil as $m)
                                    <option value="{{ $m->id_mobil }}" {{ $databukti->id_mobil == $m->id_mobil ? 'selected' : '' }}>
                                        {{ $m->nama }} (Stok: {{ $m->stok }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jumlah Mobil -->
                        <div class="col">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $editpanitia->jumlah }}" min="1">
                        </div>
                    </div>
                </div>

                <!-- Jenis Diskon dan Diskon -->
                <div class="mb-2">
                    <div class="row">
                        <div class="col">
                            <label for="jenis_diskon" class="form-label">Jenis Diskon</label>
                            <select class="form-control" name="jenis_diskon" required>
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="transaksi" {{ $databukti->jenis_diskon == 'transaksi' ? 'selected' : '' }}>Diskon Banyak Transaksi</option>
                                <option value="toko" {{ $databukti->jenis_diskon == 'toko' ? 'selected' : '' }}>Diskon dari Toko</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="diskon" class="form-label">Diskon (%)</label>
                            <input type="number" class="form-control" name="diskon" min="0" max="100" value="{{ $editpanitia->diskon }}">
                        </div>
                    </div>
                </div>

                <!-- Tanggal Pinjam dan Kembali -->
                <div class="mb-2">
                    <div class="row">
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" value="{{ $editpanitia->tgl_pinjam }}">
                        </div>
                        <div class="col">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="datetime-local" class="form-control" name="tgl_kembali" value="{{ $editpanitia->tgl_kembali }}">
                        </div>
                    </div>
                </div>

                <!-- Harga -->
                <div class="mb-2">
                    <div class="row">
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="{{ $editpanitia->harga }}" disabled>
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
<script>
    let mobilData = @json($mobil); // Data mobil dari backend

    // Fungsi untuk mengupdate harga total
    function updateHargaTotal() {
        let selectedMobilId = document.getElementById('id_mobil').value; // ID mobil yang dipilih
        let jumlah = document.getElementById('jumlah').value; // Jumlah mobil yang disewa
        let diskon = document.querySelector('input[name="diskon"]').value; // Diskon (dalam %)
        
        let selectedMobil = mobilData.find(mobil => mobil.id_mobil == selectedMobilId);
        if (selectedMobil) {
            let hargaTotal = selectedMobil.harga * jumlah;
            
            if (diskon > 0) {
                let diskonAmount = (hargaTotal * diskon) / 100;
                hargaTotal -= diskonAmount;
            }

            document.getElementById('harga').value = hargaTotal.toFixed(2);
        }
    }

    // Event listener untuk update harga total
    document.getElementById('id_mobil').addEventListener('change', updateHargaTotal);
    document.getElementById('jumlah').addEventListener('input', updateHargaTotal);
    document.querySelector('input[name="diskon"]').addEventListener('input', updateHargaTotal);

    // Hitung ulang harga pada load pertama kali
    window.onload = updateHargaTotal;
</script>
@endpush
