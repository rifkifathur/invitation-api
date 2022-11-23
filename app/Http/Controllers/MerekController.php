<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merek;
use Illuminate\Support\Facades\Validator;

class MerekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function index(){
        $data = Merek::get();
        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }

    public function store(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_merek'      => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create
            $merek = new Merek;
            $merek->nama_merek = $request->input('nama_merek');
            $merek->save();

            //return response JSON is created
            if($merek) {
                return response()->json([
                    'msg' => "Berhasil tambah merek",
                    'data'    => $merek,  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah merek',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Merek $MerekId){
        $merek = Merek::find($MerekId)->first();
        return $merek;
    }

    public function update(Request $request, Merek $MerekId){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'nama_merek'      => 'required'
            ]);

            // if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //update
            $merek = Merek::find($MerekId)->first();
            $merek->nama_merek = $request->input('nama_merek');
            $merek->update();

            //return response JSON pelanggan is created
            if($merek) {
                return response()->json([
                    'msg' => "Berhasil update merek",
                    'data'    => $merek,  
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal update merek',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function destroy(Merek $MerekId)
    {
        $merek = Merek::find($MerekId)->first();
        $merek->delete();
        return response()->json([
            'msg' => 'Berhasil hapus merek',
        ]);
    }
}
