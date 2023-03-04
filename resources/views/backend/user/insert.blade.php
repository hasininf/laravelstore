@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ url('admin/user') }}">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text"  value="{{ old('name') }}" class="form-control"  name="name">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email"  value="{{ old('email') }}" class="form-control"  name="email">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password"  value="{{ old('password') }}" class="form-control"  name="password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Level</label>
                    <select name="level" id="" class="form-control">
                        <option value="manager">manager</option>
                        <option value="kasir">kasir</option>
                        <option value="admin">admin</option>
                    </select>
                    <span class="text-danger">
                        @error('level')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
                </form>
        </div>
    </div>
@endsection