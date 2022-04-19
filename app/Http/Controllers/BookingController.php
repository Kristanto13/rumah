<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Booking::where('created_at','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.booking.list',compact('collection'));
        }
        return view('pages.booking.main');
    }
    public function create()
    {
        $user = User::inRandomOrder()->first();
        $rumah = Rumah::inRandomOrder()->first();
        $data = new Booking;
        $data->kode = Str::random(10);
        $data->customer_id = $user->id;
        $data->rumah_id = $rumah->id;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Booking tersimpan',
        ]);
    }
    public function store(Request $request)
    {
        $user = User::inRandomOrder()->first();
        $rumah = Rumah::inRandomOrder()->first();
        $data = new Booking;
        $data->kode = Str::random(10);
        $data->customer_id = $user->id;
        $data->rumah_id = $rumah->id;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Booking tersimpan',
        ]);
    }
    public function show(Booking $booking)
    {
        //
    }
    public function edit(Booking $booking)
    {
        //
    }
    public function update(Request $request, Booking $booking)
    {
        //
    }
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Booking terhapus',
        ]);
    }
}
