<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function index(){
        $data = Pelanggan::get();
        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }

    public function store(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_customer'      => 'required',
                'no_tlp'     => 'required|numeric',
                'email'  => 'required|email|unique:users'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create pelanggan
            $pelanggan = new Pelanggan;
            $pelanggan->nama_customer = $request->input('nama_customer');
            $pelanggan->no_tlp = $request->input('no_tlp');
            $pelanggan->email = $request->input('email');
            $pelanggan->save();

            //return response JSON pelanggan is created
            if($pelanggan) {
                return response()->json([
                    'msg' => "Berhasil tambah pelanggan",
                    'data'    => $pelanggan,  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal  Simpan Data Customer',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Pelanggan $PelangganId){
        $pelanggan = Pelanggan::find($PelangganId)->first();
        return $pelanggan;
    }

    public function update(Request $request, Pelanggan $PelangganId){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_customer'      => 'required',
                'no_tlp'     => 'required|numeric',
                'email'  => 'required|email|unique:users'
            ]);

            // if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //update
            $pelanggan = Pelanggan::find($PelangganId)->first();
            $pelanggan->nama_customer = $request->input('nama_customer');
            $pelanggan->no_tlp = $request->input('no_tlp');
            $pelanggan->email = $request->input('email');
            $pelanggan->update();

            //return response JSON pelanggan is created
            if($pelanggan) {
                return response()->json([
                    'msg' => "Berhasil update pelanggan",
                    'data'    => $pelanggan,  
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal update pelanggan',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function destroy(Pelanggan $PelangganId)
    {
        $Pelanggan = Pelanggan::find($PelangganId)->first();
        $Pelanggan->delete();
        return response()->json([
            'msg' => 'Berhasil hapus pelanggan',
        ]);
    }
}