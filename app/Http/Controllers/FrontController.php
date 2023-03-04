<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select data from db

        $kategoris = Kategori::all();
        // $menus = Menu::all();

        //pagination
        $menus = Menu::paginate(10);
        $pelanggans = Pelanggan::paginate(1);

        return view('menu', [
            'kategoris' => $kategoris,
            'menus' => $menus,
            'pelanggans' => $pelanggans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->input());
        // validasi
        $data = $request->validate([
            'pelanggan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jeniskelamin' => 'required',
            'email' => 'required | email |unique:pelanggans',
            'password' => 'required|min:3',
        ]);
        // dd($data);
        Pelanggan::create([
            'pelanggan' => $data['pelanggan'],
            'alamat' => $data['alamat'],
            'telp' => $data['telp'],
            'jeniskelamin' => $data['jeniskelamin'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'password' => 0,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris = Kategori::all();
        //select db where - get all
        // $menus = Menu::where('idkategori', $id)->get();
        //select db where - get all
        $menus = Menu::where('idkategori', $id)->paginate(1);

        return view('menu', ['kategoris' => $kategoris, 'menus' => $menus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function register()
    {
        $kategoris = Kategori::all();
        return view('register', ['kategoris' => $kategoris]);
    }
    public function login()
    {
        $kategoris = Kategori::all();
        return view('login', ['kategoris' => $kategoris]);
    }
    public function postlogin(Request $request)
    {
        //
        // dd($request->input());
        // validasi
        $data = $request->validate([
            'email' => 'required | email',
            'password' => 'required|min:3',
        ]);
        $pelanggan = Pelanggan::where('email', $data)->first();
        if ($pelanggan) {
            if (Hash::check($data['password'], $pelanggan['password'])) {
                $data = [
                    'idpelanggan' => $pelanggan['idpelanggan'],
                    'email' => $pelanggan['email'],
                ];
                $request->session()->put('logined', $data);
                return redirect('/');
            } else {
                echo "Password Salah.!";
            }
        } else {
            echo "Email Tidak Terdaftar";
        }

        // return redirect('/');
    }
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
