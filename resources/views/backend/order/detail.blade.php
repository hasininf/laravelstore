@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <h4>Pelanggan : {{ $orders[0]['pelanggan'] }}</h4>
        </div>
        <div class="col-12">
            <table class="table table-bordekred border-primary table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $order->menu }}</td>
                            <td>{{ $order->harga }}</td>
                            <td>{{ $order->jumlah }}</td>
                            <td>{{ $order->jumlah * $order->harga }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="4" class="text-center">Total</td>
                            <td>{{ $order->total }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection