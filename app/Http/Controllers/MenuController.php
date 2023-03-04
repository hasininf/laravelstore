<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
            ->select(['menus.*', 'kategoris.*'])
            ->paginate(10);
        return view('backend.menu.select', ['menus' => $menus, 'kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('backend.menu.insert', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'idkategori' => 'required',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required|max:2048',
        ]);

        $id = $request->idkategori;
        $namagambar = $request->file('gambar')->getClientOriginalName();
        date_default_timezone_set('Asia/Jakarta');
        $namagambar = date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        // pindah gambar
        $request->gambar->move(public_path('img'), $namagambar);

        Menu::create([
            'idkategori' => $id,
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'gambar' => $namagambar,
        ]);

        echo $request->file('gambar')->getClientOriginalExtension();
        // return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($idmenu)
    {
        Menu::where('idmenu', '=', $idmenu)->delete();
        return redirect('admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($idmenu)
    {
        $menu = Menu::where('idmenu', $idmenu)->first();
        $kategoris = Kategori::all();
        return view('backend.menu.update', ['menu' => $menu, 'kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idmenu)
    {
        // dd($request->input());
        if (isset($request->gambar)) {
            $data = $request->validate([
                'glama' => 'required',
                'idkategori' => 'required',
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'gambar' => 'required|max:2048',
            ]);


            $namagambar = $request->file('gambar')->getClientOriginalName();
            date_default_timezone_set('Asia/Jakarta');
            $namagambar = date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
            // pindah gambar
            $request->gambar->move(public_path('img'), $namagambar);

            Menu::where('idmenu', $idmenu)->update([
                'idkategori' => $data['idkategori'],
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
                'gambar' => $namagambar,
            ]);

            unlink("img/" . $data['glama']);
        } else {
            $data = $request->validate([
                'idkategori' => 'required',
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
            ]);

            Menu::where('idmenu', $idmenu)->update([
                'idkategori' => $data['idkategori'],
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
            ]);
        }


        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function select(Request $request)
    {
        $id =  $request->idkategori;

        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
            ->select(['menus.*', 'kategoris.*'])
            ->where('menus.idkategori', $id)
            ->paginate(1);
        return view('backend.menu.select', ['menus' => $menus, 'kategoris' => $kategoris]);
    }
}
