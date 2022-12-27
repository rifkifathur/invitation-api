<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Wishes;
use Illuminate\Http\Request;

class PublicApiController extends Controller
{
    public function index(){
        $data = Customer::with(['theme', 'gallery'])->get();
        return response()->json([
            'code' => '200',
            'status' => 'OK',
            'data'    => $this->refactorVar($data),
        ]);
    }

    public function show(Request $request){
        try {
            $data = Customer::where('path', '=', $request->path)->with(['theme', 'gallery'])->first();
            if($data){
                return response()->json([
                    'code' => '200',
                    'status' => 'OK',
                    'data'    => $this->refactorVar($data),
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(Request $request){
        try {
            // //set validation
            // $validator = Validator::make($request->all(), [
            //     'nama_customer'      => 'required',
            //     'no_tlp'     => 'required|numeric',
            //     'email'  => 'required|email|unique:users'
            // ]);

            // //if validation fails
            // if ($validator->fails()) {
            //     return response()->json($validator->errors(), 422);
            // }

            //create 
            $wish = new Wishes;
            $wish->name = $request->input('name');
            $wish->body = $request->input('body');
            $wish->customer_id = $request->input('customer_id');

            $wish->save();  
            //return response JSON Customer is created
            if($wish) {
                return response()->json([
                    'code' => '201',
                    'status' => 'OK',
                    'data'    => $wish,  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal  Simpan Data Wishes',
                'eror' =>  $th->getMessage(),
            ], 400);
        }
    }

    public function showWishbyCus(Request $request){
        try {
            // $data = Wishes::find($request->cusId)->get();
            $data = Wishes::where('customer_id', '=', $request->cusId)->orderBy('id', 'desc')->get();
            if($data){
                return response()->json([
                    'code' => '200',
                    'status' => 'OK',
                    'data'    => $data,
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
