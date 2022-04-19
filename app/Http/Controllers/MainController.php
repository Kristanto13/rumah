<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Booking;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function laporan(Request $request)
    {
        if ($request->ajax()) {
            $collection = Order::whereBetween('tanggal', [$request->start, $request->end])->paginate(10);
            return view('pages.laporan.list',compact('collection'));
        }
        return view('pages.laporan.main');
    }
    public function booking(Request $request)
    {
        if ($request->ajax()) {
            $collection = Booking::whereRaw("DATE(created_at) BETWEEN '$request->start' AND '$request->end'")->paginate(10);
            return view('pages.lbooking.list',compact('collection'));
        }
        return view('pages.lbooking.main');
    }
}
