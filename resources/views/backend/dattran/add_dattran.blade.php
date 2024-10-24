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
            <form action="{{ route('dattran.store') }}" method="POST">
                @csrf

                <!-- Nama Penyewa -->
                <div class="form-group">
                    <label for="id_penyewa">Nama Penyewa</label>
                    <select name="id_penyewa" class="form-control">
                        <option value="">Pilih Penyewa</option>
                        @foreach ($penyewa as $p)
                            <option value="{{ $p->id_penyewa }}">
                                {{ $p->nama }} - {{ $p->email }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Mobil -->
                <div class="mb-3">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="id_mk" class="form-label">ID_MK</label>
                            <input type="text" class="form-control" name="id_mk" required>
                        </div>

                        <div class="col">
                            <label for="id_mobil">Nama Mobil</label>
                            <select name="id_mobil" id="id_mobil" class="form-control" required>
                                <option value="" disabled selected>Pilih Mobil</option>
                                @foreach($mobil as $m)
                                <option value="{{ $m->id_mobil }}">{{ $m->nama }} (Stok: {{ $m->stok }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" value="1">
                        </div>
                    </div>
                </div>

                <!-- Script untuk harga -->
            <script>
                let mobilData = @json($mobil); // Data mobil diambil dari backend

                // Fungsi untuk menghitung harga total
                function updateHargaTotal() {
                    let selectedMobilId = document.getElementById('id_mobil').value; // ID mobil yang dipilih
                    let jumlah = document.getElementById('jumlah').value; // Jumlah mobil yang disewa
                    let diskon = document.querySelector('input[name="diskon"]').value; // Diskon (dalam %)
                    
                    // Cari mobil yang dipilih dari data mobil
                    let selectedMobil = mobilData.find(mobil => mobil.id_mobil == selectedMobilId);
                    if (selectedMobil) {
                        // Hitung harga total (harga mobil x jumlah mobil)
                        let hargaTotal = selectedMobil.harga * jumlah;
                        
                        // Jika ada diskon, kurangi harga sesuai diskon
                        if (diskon > 0) {
                            let diskonAmount = (hargaTotal * diskon) / 100;
                            hargaTotal -= diskonAmount;
                        }

                        // Tampilkan harga total di input field
                        document.getElementById('harga').value = hargaTotal.toFixed(2);
                    }
                }

                // Event listener untuk ketika mobil dipilih
                document.getElementById('id_mobil').addEventListener('change', function() {
                    updateHargaTotal(); // Panggil fungsi hitung harga
                });

                // Event listener untuk ketika jumlah mobil berubah
                document.getElementById('jumlah').addEventListener('input', function() {
                    updateHargaTotal(); // Panggil fungsi hitung harga
                });

                // Event listener untuk ketika diskon berubah
                document.querySelector('input[name="diskon"]').addEventListener('input', function() {
                    updateHargaTotal(); // Panggil fungsi hitung harga
                });
            </script>


                <!-- Diskon -->
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

                <!-- Tanggal dan Harga -->
                <div class="mb-2">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="datetime-local" class="form-control" name="tgl_pinjam" required>
                        </div>
                        <div class="col">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="datetime-local" class="form-control" name="tgl_kembali" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button onclick="history.back()" type="button" class="btn btn-danger">Batal</button>
                </div>

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
