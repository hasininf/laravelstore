<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form method="post" action="{{ url('admin/postlogin') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" value="{{ old('password') }}" class="form-control"
                            id="exampleInputPassword1" name="password">
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
        </div>
    </div>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
