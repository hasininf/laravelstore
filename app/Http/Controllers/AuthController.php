<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // if ($user = Auth::user()) {
        //     if ($user->level == "admin") {
        //         return redirect('admin/user');
        //     }

        //     if ($user->level == "kasir") {
        //         return redirect('admin/orderkasir');
        //     }

        //     if ($user->level == 'manager') {
        //         return redirect('admin/kategori');
        //     }
        // }
        return view('backend.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3',
        ]);

        $data = $request->only('email', 'password');
        // dd($data);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            // echo $user->password;
            if ($user->level == "admin") {
                return redirect('admin/user');
            }

            if ($user->level == "kasir") {
                return redirect('admin/orderkasir');
            }

            if ($user->level == 'manager') {
                return redirect('admin/kategori');
            }
        }

        // return redirect('admin');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('admin');
    }
}
