@extends('backend.back')

@section('adminkategori')
    <div class="row">
        {{-- <div class="col-12">
            <a class="btn btn-sm btn-primary" href="{{ url('admin/kategori/create') }}" >Tambah Data</a>
        </div> --}}
        <div class="col-12">
            <table class="table table-sm table-bordekred border-primary table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>L/P</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pelanggan->pelanggan }}</td>
                            <td>{{ $pelanggan->jeniskelamin }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->telp }}</td>
                            <td>{{ $pelanggan->email }}</td>
                            <td>
                                @if ($pelanggan->aktif==0)
                                    <a href="{{ url('admin/pelanggan/'.$pelanggan->idpelanggan) }}">BANNED</a>
                                @else
                                    <a href="{{ url('admin/pelanggan/'.$pelanggan->idpelanggan) }}">AKTIF</a>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="justify-content-center">
            {{ $pelanggans->withQueryString()->links(); }}
        </div>
    </div>
@endsection