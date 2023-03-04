@extends('front')

@section('content')
    @if (session('cart'))
        <div class="row">
            <div class="col-12">
                <a class="btn btn-sm btn-danger" href="{{ url('batal') }}">Batalkan Pesanan</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $total = 0;
                            
                        @endphp
                        @foreach (session('cart') as $idmenu => $menu)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $menu['menu'] }}</td>
                                <td>{{ number_format($menu['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <span><a href="{{ url('kurang/' . $menu['idmenu']) }}">[-]</a></span>
                                    {{ $menu['jumlah'] }}
                                    <span><a href="{{ url('tambah/' . $menu['idmenu']) }}">[+]</a></span>
                                </td>
                                <td>{{ number_format($menu['jumlah'] * $menu['harga'], 0, ',', '.') }}</td>
                                <td><a href="{{ url('hapus/' . $menu['idmenu']) }}">hapus</a></td>
                            </tr>
                            @php
                                $total = $total + $menu['jumlah'] * $menu['harga'];
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="4">Total Pembayaran</td>
                            <td class="text-bold">{{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <a href="{{ url('checkout') }}" class="btn btn-success btn-sm">Check Out</a>
                </div>
            </div>
        </div>
    @else
        <script>
            window.location.href = '/'
        </script>
    @endif
@endsection
