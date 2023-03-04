<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
</head>
<body>
    
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> --}}
    <div class="container">
        
<div class="row">
        {{-- <div class="col-12">
            @php
                $a ='';
                $b ='';
                if(!empty($_GET['tanggalmulai'])){
                    $a = $_GET['tanggalmulai'];
                }
                if(!empty($_GET['tanggalakhir'])){
                    $b = $_GET['tanggalakhir'];
                }
            @endphp
            <form method="get" action="{{ url('admin/orderdetail/create') }}">
                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Mulai</label>
                        <input type="date" value="{{ $a }}" class="form-control"  name="tanggalmulai">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Akhir</label>
                        <input type="date" value="{{ $b }}" class="form-control"  name="tanggalakhir">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="exampleInputEmail1" class="form-label">&nbsp;</label>
                        <button type="submit" class="form-control btn btn-primary">Tampilkan</button>
                        <button type="button" class="form-control btn btn-primary" onclick="window.open('{{ url('admin/print?tanggalmulai='.$a.'&tanggalakhir='.$b) }}','','width=200,height=100')">print</button>
                    </div>
                </div>
            </form>
        </div> --}}
        <div class="col-12">
            <table class="table table-bordekred border-primary table-striped" style="border-collapse: collapse" border="1" cellpadding="5px" cellspacing="5px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                        $total = 0;
                    @endphp
                    @foreach ($details as $detail)
                    @php
                        $total = $total+($detail->jumlah * $detail->harga);
                    @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $detail->idorder }}</td>
                            <td>{{ $detail->tanggalorder }}</td>
                            <td>{{ $detail->pelanggan }}</td>
                            <td>{{ $detail->menu }}</td>
                            <td>{{ number_format($detail->harga,2,",",".") }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>{{ number_format(($detail->jumlah * $detail->harga),2,",",".") }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <th colspan="7" class="text-center">Total</th>
                            <th>{{ number_format($total,2,",",".") }}</th>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            
            {{ $details->withQueryString()->links(); }}
        </div>

    </div>
    </div>
</body>
</html>