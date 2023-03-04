@extends('front')

@section('content')

<div class="row">
    <form method="post" action="{{ url('postlogin') }}">
        @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text"  value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" name="password">
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
    </div>
    <button type="submit" class="btn btn-success">Login</button>
    <button type="reset" class="btn btn-danger">Batal</button>
    </form>
</div>

@endsection