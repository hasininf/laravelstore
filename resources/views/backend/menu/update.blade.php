@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ url('admin/postmenu/'.$menu->idmenu) }}" enctype="multipart/form-data">
                    @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Kategori</label>
                    
                    <select class="form-select" name="idkategori" id="" onchsange="this.form.submit()">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $row)
                            @php
                                $selected='selected';
                            @endphp
                        @if ($row->idkategori==$menu->idkategori)
                            @php
                                $selected='selected';
                            @endphp
                        @else
                            @php
                                $selected='';
                            @endphp
                        @endif
                            <option {{ $selected }} value="{{ $row->idkategori }}">{{ $row->kategori }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('idkategori')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Menu</label>
                    <input type="text"  value="{{ $menu->menu }}" class="form-control"  name="menu">
                    <span class="text-danger">
                        @error('menu')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <input type="text"  value="{{ $menu->deskripsi }}" class="form-control"  name="deskripsi">
                    <input type="text"  value="{{ $menu->gambar }}" class="form-control"  name="glama">
                    <span class="text-danger">
                        @error('deskripsi')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="number"  value="{{ $menu->harga }}" class="form-control"  name="harga">
                    <span class="text-danger">
                        @error('harga')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gambar</label>
                    <input type="file"  value="" class="form-control"  name="gambar">
                    <span class="text-danger">
                        @error('gambar')
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