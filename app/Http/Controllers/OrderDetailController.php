<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use Illuminate\Http\Request;
use \PDF;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = OrderDetail::join('orders', 'order_details.idorder', '=', 'orders.idorder')
            ->join('menus', 'order_details.idmenu', '=', 'menus.idmenu')
            ->join('pelanggans', 'orders.idpelanggan', '=', 'pelanggans.idpelanggan')
            ->select(['order_details.*', 'orders.*', 'menus.*', 'pelanggans.*'])
            ->orderBy('orders.idorder', 'DESC')
            ->paginate(10);
        return view('backend.detail.select', ['details' => $details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tanggalmulai = $request->tanggalmulai;
        $tanggalakhir = $request->tanggalakhir;
        $details = OrderDetail::join('orders', 'order_details.idorder', '=', 'orders.idorder')
            ->join('menus', 'order_details.idmenu', '=', 'menus.idmenu')
            ->join('pelanggans', 'orders.idpelanggan', '=', 'pelanggans.idpelanggan')
            ->whereBetween('orders.tanggalorder', [$tanggalmulai, $tanggalakhir])
            ->select(['order_details.*', 'orders.*', 'menus.*', 'pelanggans.*'])
            ->orderBy('tanggalorder', 'DESC')
            ->paginate(10);
        return view('backend.detail.select', ['details' => $details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }

    public function print(Request $request)
    {
        $tanggalmulai = $request->tanggalmulai;
        $tanggalakhir = $request->tanggalakhir;
        $details = OrderDetail::join('orders', 'order_details.idorder', '=', 'orders.idorder')
            ->join('menus', 'order_details.idmenu', '=', 'menus.idmenu')
            ->join('pelanggans', 'orders.idpelanggan', '=', 'pelanggans.idpelanggan')
            ->whereBetween('orders.tanggalorder', [$tanggalmulai, $tanggalakhir])
            ->select(['order_details.*', 'orders.*', 'menus.*', 'pelanggans.*'])
            ->orderBy('tanggalorder', 'DESC')
            ->paginate(10);
        $n = date('YmdHis');
        $pdf = PDF::loadview('backend.detail.print', ['details' => $details]);
        return $pdf->download($n . '-laporan-pegawai-pdf.pdf');
    }
}
