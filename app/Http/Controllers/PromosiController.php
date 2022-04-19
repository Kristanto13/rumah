<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Promosi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromosiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Promosi::where('awal','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.promosi.list',compact('collection'));
        }
        return view('pages.promosi.main');
    }
    public function create()
    {
        $rumah = Rumah::get();
        return view('pages.promosi.input',['data' => new Promosi, 'rumah' => $rumah]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rumah' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            'cashback' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('rumah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('rumah'),
                ]);
            }elseif ($errors->has('awal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('awal'),
                ]);
            }elseif ($errors->has('akhir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('akhir'),
                ]);
            }elseif ($errors->has('cashback')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cashback'),
                ]);
            }
        }
        $data = new Promosi;
        $data->rumah_id = $request->rumah;
        $data->awal = $request->awal;
        $data->akhir = $request->akhir;
        $data->cashback = Str::remove(',',$request->cashback);
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Promosi tersimpan',
        ]);
    }
    public function show(Promosi $promosi)
    {
        //
    }
    public function edit(Promosi $promosi)
    {
        $rumah = Rumah::get();
        return view('pages.promosi.input',['data' => $promosi, 'rumah' => $rumah]);
    }
    public function update(Request $request, Promosi $promosi)
    {
        $validator = Validator::make($request->all(), [
            'rumah' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            'cashback' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('rumah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('rumah'),
                ]);
            }elseif ($errors->has('awal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('awal'),
                ]);
            }elseif ($errors->has('akhir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('akhir'),
                ]);
            }elseif ($errors->has('cashback')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cashback'),
                ]);
            }
        }
        $promosi->rumah_id = $request->rumah;
        $promosi->awal = $request->awal;
        $promosi->akhir = $request->akhir;
        $promosi->cashback = Str::remove(',',$request->cashback);
        $promosi->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Promosi terubah',
        ]);
    }
    public function destroy(Promosi $promosi)
    {
        $promosi->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Promosi terhapus',
        ]);
    }
}
