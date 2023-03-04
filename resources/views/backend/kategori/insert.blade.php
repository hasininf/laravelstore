@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ url('admin/kategori') }}">
                    @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                    <input type="text"  value="{{ old('kategori') }}" class="form-control"  name="kategori">
                    <span class="text-danger">
                        @error('kategori')
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