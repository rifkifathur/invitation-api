<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function QuoDraft(){
        $data = Quotation::leftJoin('pelanggan_tabel', 'pelanggan_tabel.id_pelanggan', '=', 'quotation.pelanggan_id')
        ->leftJoin('produk', 'produk.id_produk', '=', 'quotation.produk_id')
        ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')
        ->leftJoin('merek', 'merek.id_merek', '=', 'produk.merek_id')->where('status','=','Draft')->get();

        $kodeQuo = '';
        if($data->isEmpty()){
            $kodeQuo = "QT-00";
        } else {
            $tempQuo= $data->sortDesc()->first()->id_quo;
            $kodeQuo = $this->quoOto($tempQuo, "QT-", 3, "%'02s");
        }

        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }

    public function QuoData(){
        $data = Quotation::leftJoin('pelanggan_tabel', 'pelanggan_tabel.id_pelanggan', '=', 'quotation.pelanggan_id')
        ->leftJoin('produk', 'produk.id_produk', '=', 'quotation.produk_id')
        ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')
        ->leftJoin('merek', 'merek.id_merek', '=', 'produk.merek_id')->get();

        $kodeQuo = '';
        if($data->isEmpty()){
            $kodeQuo = "QT-00";
        } else {
            $tempQuo= $data->sortDesc()->first()->id_quo;
            $kodeQuo = $this->quoOto($tempQuo, "QT-", 3, "%'02s");
        }

        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }


    protected function quoOto($kd, $char, $str, $digit){
        $KdPecah = substr($kd, $str);
        $ParseKd = (int)$KdPecah + 1;
        $tempKd = sprintf($digit, $ParseKd);
        $KdBaru = $char.$tempKd;
        return $KdBaru;
    }

    public function DraftStore(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'qty'      => 'required|numeric',
                'pelanggan_id'   => 'required',
                'produk_id' => 'required'
                
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create
            $quo = new Quotation;
            $data = Quotation::get();
            
            $kodeQuo = '';
            if($data->isEmpty()){
                $kodeQuo = "QT-00";
            } else {
                $tempQuo= $data->sortDesc()->first()->no_qt;
                $kodeQuo = $this->quoOto($tempQuo, "QT-", 3, "%'02s");
            }

            $userId = User::where('id',auth()->user()->id)->first();

            $quo->no_qt = $kodeQuo;
            $quo->qty = $request->input('qty');
            $quo->pelanggan_id = $request->input('pelanggan_id');
            $quo->produk_id = $request->input('produk_id');
            $produk = Produk::where('id_produk', $quo->produk_id)->first();
            $quo->total = $request->input('qty')*$produk->harga;
            $quo->pembuat = $userId->id;
            $quo->status = 'Draft';
            $quo->save();

            //return response JSON is created
            if($quo) {
                return response()->json([
                    'msg' => "Berhasil tambah quo",
                    'data'    => $quo,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah quo',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function SavedStore(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'qty'      => 'required|numeric',
                // 'total'      => 'required|numeric',
                // 'status'   => 'required',
                'pelanggan_id'   => 'required',
                'produk_id' => 'required',
                'status' => 'required'
                
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create
            // $quo = new Quotation;
            $quo = Quotation::where('status','Draft')->where('pembuat',auth()->user()->id)->first();

            $quo->qty = $request->input('qty');
            $quo->pelanggan_id = $request->input('pelanggan_id');
            $quo->produk_id = $request->input('produk_id');
            $produk = Produk::where('id_produk', $quo->produk_id)->first();
            $quo->total = $request->input('qty')*$produk->harga;
            if($request->input('status') == 'Draft'){
                $quo->status = 'Pending Quotation';
            }
            $quo->update();

            //return response JSON is created
            if($quo) {
                return response()->json([
                    'msg' => "Berhasil tambah quo",
                    'data'    => $quo,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah quo',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function update(Request $request, Quotation $QuoId){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'qty'      => 'required|numeric',
                'pelanggan_id'   => 'required',
                'produk_id' => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //update
            $quo = Quotation::find($QuoId)->first();
            $quo->qty = $request->input('qty');
            $quo->pelanggan_id = $request->input('pelanggan_id');
            $quo->produk_id = $request->input('produk_id');
            $produk = Produk::where('id_produk', $quo->produk_id)->first();
            $quo->total = $request->input('qty')*$produk->harga;
            $quo->update();
            
            //return response JSON is created
            if($quo) {
                return response()->json([
                    'msg' => "Berhasil ubah quo",
                    'data'    => $quo,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal ubah quo',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }
    
    public function sent(Quotation $QuoId){
        try {
            //update    
            $status = Quotation::find($QuoId)->first();
            $status->status = 'sent';
            $status->update();
            
            //return response JSON is created
            if($status) {
                return response()->json([
                    'msg' => "Berhasil kirim quo",
                    'data'    => $status,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal kirim quo',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Quotation $QuoId){
        $id = $QuoId;
        $quo = Quotation::leftJoin('pelanggan_tabel', 'pelanggan_tabel.id_pelanggan', '=', 'quotation.pelanggan_id')
        ->leftJoin('produk', 'produk.id_produk', '=', 'quotation.produk_id')
        ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')
        ->leftJoin('merek', 'merek.id_merek', '=', 'produk.merek_id')->find($QuoId)->first();
        return $quo;
    }

    public function destroy(Quotation $QuoId)
    {
        $quo = Quotation::find($QuoId)->first();
        $quo->delete();
        return response()->json([
            'msg' => 'Berhasil hapus quo',
        ]);
    }
}
