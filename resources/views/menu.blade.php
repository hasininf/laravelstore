@extends('front')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($menus as $menu)
    <div class="col">
        <div class="card">
        <img src="{{ asset('img/'.$menu->gambar) }}" class="card-img-top" alt="..."  width="150px" height="150px">
        <div class="card-body">
            <h5 class="card-title">{{ $menu->menu }}</h5>
            <p class="card-text">{{ $menu->deskripsi }}</p>
            <h6 class="card-title">IDR. {{ number_format($menu->harga,2,",",".") }}</h6>
            @if (session()->has('logined'))
            <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary">Beli</a>
            @else
            <a href="{{ url('login') }}" class="btn btn-primary">Beli</a>
            @endif
        </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row mt-4">
    <div class="justify-content-center d-flex mt-2">
        {{ $menus->links() }}
    </div>
</div>

@endsection