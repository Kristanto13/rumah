<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Customer::where('nama','LIKE','%'.$request->keyword.'%')->paginate(10);
            return view('pages.customer.list',compact('collection'));
        }
        return view('pages.customer.main');
    }
    public function create()
    {
        return view('pages.customer.input',['data' => new Customer]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_ktp' => 'max:16|unique:customers,no_ktp',
            'nama' => 'required',
            'phone' => 'required|max:16|unique:customers,phone',
            'email' => 'required|unique:customers,email',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('no_ktp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_ktp'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }
        }
        $data = new Customer;
        $data->no_ktp = $request->no_ktp;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->nama = $request->nama;
        $data->gender = $request->gender;
        $data->alamat = $request->alamat;
        $data->kota = $request->kota;
        $data->kodepos = $request->kodepos;
        // if(request()->file('thumbnail')){
        //     Storage::delete($data->thumbnail);
        //     $thumbnail = request()->file('thumbnail')->store("thumbnail");
        //     $data->thumbnail = $thumbnail;
        // }
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Customer tersimpan',
        ]);
    }
    public function show(Customer $customer)
    {
        //
    }
    public function edit(Customer $customer)
    {
        return view('pages.customer.input',['data' => $customer]);
    }
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'no_ktp' => 'max:16|unique:customers,no_ktp,'.$customer->id,
            'phone' => 'required|max:16|unique:customers,phone,'.$customer->id,
            'email' => 'required|unique:customers,email,'.$customer->id,
            'nama' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('no_ktp')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_ktp'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }
        }
        $customer->no_ktp = $request->no_ktp;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->nama = $request->nama;
        $customer->gender = $request->gender;
        $customer->alamat = $request->alamat;
        $customer->kota = $request->kota;
        $customer->kodepos = $request->kodepos;
        $customer->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Customer diperbarui',
        ]);
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Customer terhapus',
        ]);
    }
}
