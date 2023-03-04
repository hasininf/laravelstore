@extends('front')

@section('content')
<div class="row">
    
    @foreach ($menus as $menu)
        <div class="card" style="width: 13rem;">
            <img src="{{ asset('img/'.$menu->gambar) }}" class="card-img-top" alt="..." style="width: 150px;height:150px">
            <div class="card-body">
                <h5 class="card-title">{{ $menu->menu }}</h5>
                <p class="card-text">{{ $menu->deskripsi }}</p>
                <h5 class="card-title">{{ $menu->harga }}</h5>
                <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary">Beli</a>
            </div>
        </div>
    @endforeach
    {{-- <div class="justify-content-center d-flex mt-2">
        {{ $menus->links() }}
    </div> --}}
</div>
@endsection