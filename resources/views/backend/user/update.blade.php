@extends('backend.back')

@section('adminkategori')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ url('admin/user/'.$user->id) }}">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text"  value="{{ $user->name }}" class="form-control"  name="name">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" readonly value="{{ $user->email }}" class="form-control"  name="email">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Level</label>
                    <select name="level" id="" class="form-control">
                        @php
                            if($user->level=='manager'){
                                $manager ='selected';
                                $kasir ='';
                                $admin ='';
                            }
                            else if($user->level=='kasir'){
                                $manager ='';
                                $kasir ='selected';
                                $admin ='';
                            }
                            else if($user->level=='admin'){
                                $manager ='';
                                $kasir ='';
                                $admin ='selected';
                            }
                        @endphp
                        <option {{ $manager }} value="manager">manager</option>
                        <option {{ $kasir }} value="kasir">kasir</option>
                        <option {{ $admin }} value="admin">admin</option>
                    </select>
                    <span class="text-danger">
                        @error('level')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
                </form>
        </div>
    </div>
@endsection