<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;
use File;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function index(){
        $data = Produk::leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')->get();
        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }

    public function store(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_produk'      => 'required',
                'harga'      => 'required|numeric',
                'stok'      => 'required|numeric',
                'img'   => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create
            $file = $request->file('img');
            $nama_file = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $nama_file);

            $produk = new Produk;
            $produk->img = $nama_file;
            $produk->nama_produk = $request->input('nama_produk');
            $produk->harga = $request->input('harga');
            $produk->stok = $request->input('stok');
            $produk->merek_id = $request->input('merek_id');
            $produk->kategori_id = $request->input('kategori_id');
            $produk->save();

            //return response JSON is created
            if($produk) {
                return response()->json([
                    'msg' => "Berhasil tambah produk",
                    'data'    => $produk,  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah produk',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Produk $ProdukId){
        $produk = Produk::find($ProdukId)->first();
        return $produk;
    }

    public function update(Request $request, Produk $ProdukId){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_produk'      => 'required',
                'harga'      => 'required|numeric',
                'stok'      => 'required|numeric',
                'img'   => 'required'
            ]);

            // if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //update
            $produk = Produk::find($ProdukId)->first();
            if ($produk->img) {
                $image_path = public_path('images/'.$produk->img); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $file = $request->file('img');
            $nama_file = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $nama_file);
            
            $produk->img = $nama_file;
            $produk->nama_produk = $request->input('nama_produk');
            $produk->harga = $request->input('harga');
            $produk->stok = $request->input('stok');
            $produk->merek_id = $request->input('merek_id');
            $produk->kategori_id = $request->input('kategori_id');
            $produk->update();

            //return response JSON pelanggan is created
            if($produk) {
                return response()->json([
                    'msg' => "Berhasil update produk",
                    'data'    => $produk,  
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal update produk',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function destroy(Produk $ProdukId)
    {
        $produk = Produk::find($ProdukId)->first();
        return response()->json([
            'msg' => 'Berhasil hapus produk',
        ]);
    }
}
