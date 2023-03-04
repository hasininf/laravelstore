@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <h1>{{ number_format($order->total,0,",",".") }}</h1>
        </div>
        <div class="col-12">
            <form method="post" action="{{ url('admin/order/'.$order->idorder) }}">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Bayar</label>
                    <input type="number"   min="{{ $order->total }}" class="form-control" name="bayar">
                    <span class="text-danger">
                        @error('bayar')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-success">Bayar</button>
                <button type="reset" class="btn btn-danger">Batal</button>
                </form>
        </div>
    </div>
@endsection