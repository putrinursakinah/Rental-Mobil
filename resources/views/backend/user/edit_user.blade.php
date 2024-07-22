@extends('admin.admin_master')
@section('title','Edit User')
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
                <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{$editpanitia->name}}" required>
                                <!-- <option selected>Pilih</option>
                                <option value="Tim">Tim</option>
                                <option value="Individu">Individu</option>
                            </select> -->
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$editpanitia->email}}" required>
                        </div>
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input id= "password" type="password" class="form-control" name="password" value="{{$editpanitia->password}}" required autocomplete="new-password">
                        </div>
                        {{-- <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div> --}}
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