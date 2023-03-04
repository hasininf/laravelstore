@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            {{-- <a class="btn btn-sm btn-primary" href="{{ url('admin/kategori/create') }}" >Tambah Data</a> --}}
        </div>
        <div class="col-12">
            <table class="table table-bordekred border-primary table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            {{-- <td>{{ $no++ }}</td> --}}
                            <td>{{ $order->idorder }}</td>
                            <td><a href="{{ url('admin/order/'.$order->idorder) }}">{{ $order->pelanggan }}</a></td>
                            <td>{{ $order->tanggalorder }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->bayar }}</td>
                            <td>{{ $order->kembali }}</td>
                            @php
                                $status="LUNAS";
                                if($order->status==0){
                                    $status = '<span class="bg-light bg-primary"><a href="'.url('admin/order/'.$order->idorder.'/edit').'">BAYAR</a></span>';
                                }
                            @endphp
                            <td>{!! $status !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection