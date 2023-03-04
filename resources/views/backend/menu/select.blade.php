@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm btn-primary" href="{{ url('admin/menu/create') }}">Tambah Data</a>
        </div>
        <div class="col-12">
            <form action="{{ url('admin/select') }}" method="get">
                <select class="form-select" name="idkategori" id="" onchange="this.form.submit()">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $row)
                        <option value="{{ $row->idkategori }}">{{ $row->kategori }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Menu</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $menu->kategori }}</td>
                            <td>{{ $menu->menu }}</td>
                            <td>{{ $menu->deskripsi }}</td>
                            <td><img width="100px" height="60px" src="{{ asset('img/' . $menu->gambar) }}" alt="">
                            </td>
                            <td>{{ $menu->harga }}</td>
                            <td><a href="{{ url('admin/menu/' . $menu->idmenu . '/edit') }}">Ubah</a></td>
                            <td><a href="{{ url('admin/menu/' . $menu->idmenu) }}">Hapus</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            {{ $menus->withQueryString()->links() }}
        </div>
    </div>
@endsection
