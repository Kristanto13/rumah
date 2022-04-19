<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RumahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Rumah::where('nama','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.rumah.list',compact('collection'));
        }
        return view('pages.rumah.main');
    }
    public function create()
    {
        return view('pages.rumah.input',['data' => new Rumah]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'max:16|unique:rumah,kode',
            'nama' => 'required',
            'kamar' => 'required|max:3',
            'toilet' => 'required|max:3',
            'lantai' => 'required|max:3',
            'jenis' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'unit' => 'required|max:3',
            'alamat' => 'required',
            'daerah' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kode')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kode'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('kamar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kamar'),
                ]);
            }elseif ($errors->has('toilet')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('toilet'),
                ]);
            }elseif ($errors->has('lantai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('lantai'),
                ]);
            }elseif ($errors->has('jenis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis'),
                ]);
            }elseif ($errors->has('ukuran')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('ukuran'),
                ]);
            }elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            }elseif ($errors->has('unit')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('unit'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('daerah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('daerah'),
                ]);
            }
        }
        $data = new Rumah;
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->kamar = $request->kamar;
        $data->toilet = $request->toilet;
        $data->lantai = $request->lantai;
        $data->jenis = $request->jenis;
        $data->ukuran = $request->ukuran;
        $data->harga = Str::remove(',',$request->harga);
        $data->unit = $request->unit;
        $data->alamat = $request->alamat;
        $data->daerah = $request->daerah;
        $data->is_pasar = $request->is_pasar;
        $data->is_banjir = $request->is_banjir;
        if(request()->file('file_1')){
            $file_1 = request()->file('file_1')->store("file");
            $data->file_1 = $file_1;
        }
        if(request()->file('file_2')){
            $file_2 = request()->file('file_2')->store("file");
            $data->file_2 = $file_2;
        }
        if(request()->file('file_3')){
            $file_3 = request()->file('file_3')->store("file");
            $data->file_3 = $file_3;
        }
        if(request()->file('file_4')){
            $file_4 = request()->file('file_4')->store("file");
            $data->file_4 = $file_4;
        }
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Rumah tersimpan',
        ]);
    }
    public function show(Rumah $rumah)
    {
        //
    }
    public function edit(Rumah $rumah)
    {
        return view('pages.rumah.input',['data' => $rumah]);
    }
    public function update(Request $request, Rumah $rumah)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'max:16|unique:rumah,kode,'.$rumah->id,
            'nama' => 'required',
            'kamar' => 'required|max:3',
            'toilet' => 'required|max:3',
            'lantai' => 'required|max:3',
            'jenis' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'unit' => 'required|max:3',
            'alamat' => 'required',
            'daerah' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kode')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kode'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('kamar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kamar'),
                ]);
            }elseif ($errors->has('toilet')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('toilet'),
                ]);
            }elseif ($errors->has('lantai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('lantai'),
                ]);
            }elseif ($errors->has('jenis')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis'),
                ]);
            }elseif ($errors->has('ukuran')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('ukuran'),
                ]);
            }elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            }elseif ($errors->has('unit')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('unit'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('daerah')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('daerah'),
                ]);
            }
        }
        $rumah->kode = $request->kode;
        $rumah->nama = $request->nama;
        $rumah->kamar = $request->kamar;
        $rumah->toilet = $request->toilet;
        $rumah->lantai = $request->lantai;
        $rumah->jenis = $request->jenis;
        $rumah->ukuran = $request->ukuran;
        $rumah->harga = Str::remove(',',$request->harga);
        $rumah->unit = $request->unit;
        $rumah->alamat = $request->alamat;
        $rumah->daerah = $request->daerah;
        $rumah->is_pasar = $request->is_pasar;
        $rumah->is_banjir = $request->is_banjir;
        if(request()->file('file_1')){
            Storage::delete($rumah->file_1);
            $file_1 = request()->file('file_1')->store("file");
            $rumah->file_1 = $file_1;
        }
        if(request()->file('file_2')){
            Storage::delete($rumah->file_2);
            $file_2 = request()->file('file_2')->store("file");
            $rumah->file_2 = $file_2;
        }
        if(request()->file('file_3')){
            Storage::delete($rumah->file_3);
            $file_3 = request()->file('file_3')->store("file");
            $rumah->file_3 = $file_3;
        }
        if(request()->file('file_4')){
            Storage::delete($rumah->file_4);
            $file_4 = request()->file('file_4')->store("file");
            $rumah->file_4 = $file_4;
        }
        $rumah->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Rumah diperbarui',
        ]);
    }
    public function destroy(Rumah $rumah)
    {
        $rumah->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Rumah dihapus',
        ]);
    }
}
