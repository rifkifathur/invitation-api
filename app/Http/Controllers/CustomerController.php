<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Theme;
use App\Models\Gallery;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function index(){
        $data = Customer::with(['theme', 'gallery'])->get();
        return response()->json([
            'code' => '200',
            'status' => 'OK',
            'data'    => $this->refactorVar($data),
        ]);
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

            //create Customer
            $customer = new Customer;
            $customerId;
            if($customer->all()->isEmpty()){
                $customerId = 1;
            } else {
                $customerId = $customer->all()->sortDesc()->first()->id + 1;
            }
            $customer->id = $customerId;
            $customer->fullname_man = $request->input('manFullName');
            $customer->callname_man = $request->input('manCallName');
            $customer->fathername_man = $request->input('manFatherName');
            $customer->mothername_man = $request->input('manMotherName');
            $customer->fullname_woman = $request->input('womanFullName');
            $customer->callname_woman = $request->input('womancallName');
            $customer->fathername_woman = $request->input('womanFatherName'); 
            $customer->mothername_woman = $request->input('womanMotherName');
            $customer->akad_date = $request->input('akadDate');
            $customer->akad_address = $request->input('akadAddress');
            $customer->resepsi_date = $request->input('resepsiDate');
            $customer->resepsi_address = $request->input('resepsiAddress');
            $customer->path = $request->input('path');
            $customer->theme_id = $request->input('theme');
            if ($files = $request->file('coupleImg')) {
                $customer->couple_img = $files->store($request->input('path'));
            }
            if ($files = $request->file('manImg')) {
                $customer->man_img = $files->store($request->input('path'));
            }
            if ($files = $request->file('womanImg')) {
                $customer->woman_img = $files->store($request->input('path'));
            }

            $gallery = new Gallery;
            if ($files = $request->file('gallery')) {
                foreach ($files as $file) {
                    $gallery::insert([
                        'img' => $file->store($request->input('path')),
                        'customer_id' => $customerId
                    ]);
                }
            }

            $customer->save();  
            //return response JSON Customer is created
            if($customer) {
                return response()->json([
                    'code' => '201',
                    'status' => 'OK',
                    'data'    => $this->refactorVar($customer->load('theme')),  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal  Simpan Data Customer',
                'eror' =>  $th->getMessage(),
            ], 400);
        }
    }

    public function show(Customer $CustomerId){
        $Customer = Customer::find($CustomerId)->first();
        return $Customer;
    }

    public function update(Request $request, Customer $CustomerId){
        try {
            //set validation
            // $validator = Validator::make($request->all(), [
            //     'nama_customer'      => 'required',
            //     'no_tlp'     => 'required|numeric',
            //     'email'  => 'required|email|unique:users'
            // ]);

            // if validation fails
            // if ($validator->fails()) {
            //     return response()->json($validator->errors(), 422);
            // }

            //update
            $customer = Customer::find($CustomerId)->first();
            $customer->id = $request->input('id');
            $customer->fullname_man = $request->input('manFullName');
            $customer->callname_man = $request->input('manCallName');
            $customer->fathername_man = $request->input('manFatherName');
            $customer->mothername_man = $request->input('manMotherName');
            $customer->fullname_woman = $request->input('womanFullName');
            $customer->callname_woman = $request->input('womancallName');
            $customer->fathername_woman = $request->input('womanFatherName'); 
            $customer->mothername_woman = $request->input('womanMotherName');
            $customer->akad_date = $request->input('akadDate');
            $customer->akad_address = $request->input('akadAddress');
            $customer->resepsi_date = $request->input('resepsiDate');
            $customer->resepsi_address = $request->input('resepsiAddress');
            $customer->path = $request->input('path');
            $customer->theme_id = $request->input('theme');
            $customer->update();

            //return response JSON Customer is created
            if($customer) {
                return response()->json([
                    'code' => '201',
                    'status' => 'OK',
                    'data'    => $this->refactorVar($customer->load('theme')),  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal update Customer',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function destroy(Customer $CustomerId)
    {
        $customer = Customer::find($CustomerId)->first();
        $customer->delete();
        return response()->json([
            'code' => '201',
            'status' => 'OK',
            'data'    => $this->refactorVar($customer->load('theme')),  
        ]);
    }
}