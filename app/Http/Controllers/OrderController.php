<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Rumah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Order::where('tanggal','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.order.list',compact('collection'));
        }
        return view('pages.order.main');
    }
    public function create()
    {
        $user = User::inRandomOrder()->first();
        $rumah = Rumah::inRandomOrder()->first();
        $data = new Order;
        $data->kode = Str::random(10);
        $data->tanggal = date("Y-m-d");
        $data->customer_id = $user->id;
        $data->rumah_id = $rumah->id;
        $data->jumlah = 1;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pemesanan tersimpan',
        ]);
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Order $order)
    {
        //
    }
    public function edit(Order $order)
    {
        //
    }
    public function update(Request $request, Order $order)
    {
        //
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pemesanan terhapus',
        ]);
    }
}
