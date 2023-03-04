<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function beli($idmenu)
    {
        $menu = Menu::where('idmenu', $idmenu)->first();
        // return $menu['menu'];

        $cart = session()->get('cart', []);
        if (isset($cart[$idmenu])) {
            $cart[$idmenu]['jumlah']++;
            echo "Ok";
        } else {
            $cart[$idmenu] = [
                'idmenu' => $menu->idmenu,
                'menu' => $menu->menu,
                'harga' => $menu->harga,
                'jumlah' => 1,
            ];
            echo "Oke";
        }

        session()->put('cart', $cart);

        echo count(session('cart'));
        return redirect('cart/');
    }
    public function cart()
    {
        $kategoris = Kategori::all();
        return view('cart', ['kategoris' => $kategoris]);
    }
    public function hapus($idmenu)
    {
        $cart = session()->get('cart');
        if (isset($cart[$idmenu])) {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }
        return redirect('cart');
    }

    public function batal()
    {
        session()->forget('cart');
        return redirect('/');
    }
    public function tambah($idmenu)
    {
        $cart = session()->get('cart');
        $cart[$idmenu]['jumlah']++;
        session()->put('cart', $cart);
        return redirect('cart');
    }
    public function kurang($idmenu)
    {
        $cart = session()->get('cart');
        if ($cart[$idmenu]['jumlah'] > 1) {
            $cart[$idmenu]['jumlah']--;
            session()->put('cart', $cart);
        } else {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }
        if (count(session('cart')) < 1) {
            session()->forget('cart');
        }
        return redirect('cart');
    }
    public function checkout()
    {
        date_default_timezone_set('Asia/Jakarta');
        $idorder = date('YmdHms');
        $total = 0;

        foreach (session('cart') as $key => $value) {
            $data = [
                'idorder' => $idorder,
                'idmenu' => $value['idmenu'],
                'jumlah' => $value['jumlah'],
                'hargajual' => $value['harga'],
            ];
            $total = $total + ($value['jumlah'] * $value['harga']);
            OrderDetail::create($data);
        }
        $tglorder = date('Y-m-d');

        $data = [
            'idorder' => $idorder,
            'idpelanggan' => session('logined')['idpelanggan'],
            'tanggalorder' => $tglorder,
            'total' => $total,
            'bayar' => 0,
            'kembali' => 0,
            'status' => 0,
        ];

        Order::create($data);
        session()->forget('cart');

        return redirect('cart');
        // echo session('logined')['idpelanggan'];
    }
}
