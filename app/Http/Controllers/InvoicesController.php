<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Produk;
use App\Models\User;
use App\Models\Invoices;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function InvDraft(){
        // $data = Quotation::leftJoin('pelanggan_tabel', 'pelanggan_tabel.id_pelanggan', '=', 'quotation.pelanggan_id')
        // ->leftJoin('produk', 'produk.id_produk', '=', 'quotation.produk_id')
        // ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')
        // ->leftJoin('merek', 'merek.id_merek', '=', 'produk.merek_id')->where('status','=','Draft')->get();

        // $kodeInv = '';
        // if($data->isEmpty()){
        //     $kodeInv = "QT-00";
        // } else {
        //     $tempInv= $data->sortDesc()->first()->id_quo;
        //     $kodeInv = $this->quoOto($tempInv, "QT-", 3, "%'02s");
        // }

        $data = Invoices::get();
        return response()->json([
            'msg' => 'Berhasil tampil data',
            'data'    => $data
        ]);
    }

    // public function QuoData(){
    //     $data = Quotation::leftJoin('pelanggan_tabel', 'pelanggan_tabel.id_pelanggan', '=', 'quotation.pelanggan_id')
    //     ->leftJoin('produk', 'produk.id_produk', '=', 'quotation.produk_id')
    //     ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')
    //     ->leftJoin('merek', 'merek.id_merek', '=', 'produk.merek_id')->get();

    //     $kodeInv = '';
    //     if($data->isEmpty()){
    //         $kodeInv = "QT-00";
    //     } else {
    //         $tempInv= $data->sortDesc()->first()->id_quo;
    //         $kodeInv = $this->quoOto($tempInv, "QT-", 3, "%'02s");
    //     }

    //     return response()->json([
    //         'msg' => 'Berhasil tampil data',
    //         'data'    => $data
    //     ]);
    // }


    protected function InvOto($kd, $char, $str, $digit){
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
                'quo_id'      => 'required',
                'keterangan'   => 'required',
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create
            $inv = new Invoices;
            $data = Invoices::get();
            
            $kodeInv = '';
            if($data->isEmpty()){
                $kodeInv = "INV-00";
            } else {
                $tempInv= $data->sortDesc()->first()->no_inv;
                $kodeInv = $this->quoOto($tempInv, "INV-", 4, "%'02s");
            }

            $userId = User::where('id',auth()->user()->id)->first();

            $inv->no_inv = $kodeInv;
            $inv->quo_id = $request->input('quo_id');
            $inv->keterangan = $request->input('keterangan');
            $inv->pembuat = $userId->id;
            $inv->status = 'Draft';
            $inv->save();

            //return response JSON is created
            if($inv) {
                return response()->json([
                    'msg' => "Berhasil tambah inv",
                    'data'    => $inv,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah inv',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function SavedStore(Request $request){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'quo_id'      => 'required',
                'keterangan'   => 'required',
                'status' => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //storeSaved
            $inv = Invoices::where('status','Draft')->where('pembuat',auth()->user()->id)->first();

            $inv->quo_id = $request->input('quo_id');
            $inv->keterangan = $request->input('keterangan');
            if($request->input('status') == 'Draft'){
                $inv->status = 'Pending Invoices';
            }
            $inv->update();
            // dd($produk);
            //return response JSON is created
            if($inv) {
                return response()->json([
                    'msg' => "Berhasil tambah inv",
                    'data'    => $inv,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah inv',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function update(Request $request, Invoices $InvId){
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'quo_id'      => 'required',
                'keterangan'   => 'required',
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //update
            $inv = Invoices::find($InvId)->first();
        
            $inv->quo_id = $request->input('quo_id');
            $inv->keterangan = $request->input('keterangan');
            $inv->update();
            
            //return response JSON is created
            if($inv) {
                return response()->json([
                    'msg' => "Berhasil ubah inv",
                    'data'    => $inv,  
                ], 201);
            } else if($produk->stok===0){
                return response()->json([
                    'errror' => "Stok habis"
                ], 422);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal ubah inv',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }
    
    public function sent(Invoices $InvId){
        try {
            //update    
            $status = Invoices::find($InvId)->first();
            if($status->status == 'Pending Invoices'){
                $status->status = 'Invoiced';
            }
            $status->update();
            
            // return response JSON is created
            if($status) {
                return response()->json([
                    'msg' => "Berhasil kirim inv",
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
                'msg' => 'Gagal kirim inv',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function payment(Invoices $InvId){
        try {
            //update    
            $status = Invoices::find($InvId)->first();
            if($status->status == 'sent'){
                $status->status = 'Reiceved Payment';
            }
            $status->update();
            
            // return response JSON is created
            if($status) {
                return response()->json([
                    'msg' => "Berhasil Bayar inv",
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
                'msg' => 'Gagal bayar inv',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Invoices $InvId){
        $inv = Invoices::leftJoin('quotation', 'quotation.id_quo', '=', 'invoices.quo_id')
        ->leftJoin('pelanggan_tabel', 'pelanggan_tabel.id_pelanggan', '=', 'quotation.pelanggan_id')
        ->leftJoin('produk', 'produk.id_produk', '=', 'quotation.produk_id')
        ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.kategori_id')
        ->leftJoin('merek', 'merek.id_merek', '=', 'produk.merek_id')
        ->select('invoices.*', 'quotation.no_qt', 'pelanggan_tabel.*', 'produk.*', 'kategori.*', 'merek.*')
        ->find($InvId)
        ->first();
        return $inv;
    }

    public function destroy(Invoices $InvId)
    {
        $inv = Invoices::find($InvId)->first();
        $inv->delete();
        return response()->json([
            'msg' => 'Berhasil hapus inv',
        ]);
    }
}
