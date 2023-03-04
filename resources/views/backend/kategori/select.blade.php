@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm btn-primary" href="{{ url('admin/kategori/create') }}" >Tambah Data</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Ubah</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kategori->kategori }}</td>
                            <td><a href="{{ url('admin/kategori/'.$kategori->idkategori.'/edit') }}">Ubah</a></td>
                            <td><a href="{{ url('admin/kategori/'.$kategori->idkategori) }}">Hapus</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection