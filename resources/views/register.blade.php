@extends('front')

@section('content')

<div class="row">
    <form method="post" action="{{ url('postregister') }}">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pelanggan</label>
        <input type="text" class="form-control" value="{{ old('pelanggan') }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="pelanggan">
        <span class="text-danger">
            @error('pelanggan')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Alamat</label>
        <input type="text" class="form-control" value="{{ old('alamat') }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat">
        <span class="text-danger">
            @error('alamat')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Telp</label>
        <input type="text" class="form-control" value="{{ old('telp') }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="telp">
        <span class="text-danger">
            @error('telp')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
        <select class="form-select" aria-label="Default select example" name="jeniskelamin">
            <option selected>Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <span class="text-danger">
            @error('jeniskelamin')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text"  value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" name="password">
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <button type="reset" class="btn btn-danger">Batal</button>
    </form>
</div>

@endsection