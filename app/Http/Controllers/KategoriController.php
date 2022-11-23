<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function index(){
        $data = Kategori::get();
        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }

    public function store(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_kategori'      => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create
            $kategori = new Kategori;
            $kategori->nama_kategori = $request->input('nama_kategori');
            $kategori->save();

            //return response JSON is created
            if($kategori) {
                return response()->json([
                    'msg' => "Berhasil tambah kategori",
                    'data'    => $kategori,  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah kategori',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Kategori $KategoriId){
        $kategori = Kategori::find($KategoriId)->first();
        return $kategori;
    }

    public function update(Request $request, Kategori $KategoriId){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_kategori'      => 'required'
            ]);

            // if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //update
            $kategori = Kategori::find($KategoriId)->first();
            $kategori->nama_kategori = $request->input('nama_kategori');
            $kategori->update();

            //return response JSON pelanggan is created
            if($kategori) {
                return response()->json([
                    'msg' => "Berhasil update kategori",
                    'data'    => $kategori,  
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal update kategori',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function destroy(Kategori $KategoriId)
    {
        $kategori = Kategori::find($KategoriId)->first();
        $kategori->delete();
        return response()->json([
            'msg' => 'Berhasil hapus kategori',
        ]);
    }
}
