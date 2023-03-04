@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-sm btn-primary" href="{{ url('admin/user/create') }}" >Tambah Data</a>

            @if (session()->has('pesan'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <a href="{{ url('admin/user/'.$user->id.'/edit') }}">Ubah</a>
                                <a href="{{ url('admin/user/'.$user->id) }}">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection