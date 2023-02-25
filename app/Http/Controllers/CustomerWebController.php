<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Theme;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Stories;
use Illuminate\Support\Facades\Storage;
class CustomerWebController extends Controller
{
    public function index(){
        $data = Customer::all();

        return view('customer.index', compact(['data']));
    }

    public function create(){
        $bank = Bank::all();
        $theme = Theme::all();
        $data = null;
        return view('customer.form', compact(['data', 'bank', 'theme']));
    }

    public function store(Request $request){
        // dd($request->file('manImg'));
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
        $customer->order_man = $request->input('manOrder');
        $customer->fathername_man = $request->input('manFatherName');
        $customer->mothername_man = $request->input('manMotherName');
        $customer->fullname_woman = $request->input('womanFullName');
        $customer->callname_woman = $request->input('womanCallName');
        $customer->order_woman = $request->input('womanOrder');
        $customer->fathername_woman = $request->input('womanFatherName'); 
        $customer->mothername_woman = $request->input('womanMotherName');
        $customer->akad_date = $request->input('akadDate');
        $customer->akad_address = $request->input('akadAddress');
        $customer->link_akad_address = $request->input('akadAddressLink');
        $customer->resepsi_date = $request->input('resepsiDate');
        $customer->resepsi_address = $request->input('resepsiAddress');
        $customer->link_resepsi_address = $request->input('resepsiAddressLink');
        $customer->path = $request->input('path');
        $customer->theme_id = $request->input('theme');
        $customer->man_bank_id = $request->input('manBank');
        $customer->woman_bank_id = $request->input('womanBank');
        $customer->man_rek = $request->input('manRek');
        $customer->woman_rek = $request->input('womanRek');
        $customer->song = $request->input('song');
        if ($files = $request->file('coupleImg')) {
            $customer->couple_img = $files->store($request->input('path'));
        }
        if ($files = $request->file('manImg')) {
            $customer->man_img = $files->store($request->input('path'));
        }
        if ($files = $request->file('womanImg')) {
            $customer->woman_img = $files->store($request->input('path'));
        }

        $stories = new Stories;
        foreach ($request->input('titleStory') as $key => $titleS) {
            // dd($body[$key]);
            if($titleS){
                $stories::insert([
                    'title' => $titleS,
                    'body' => $request->input('bodyStory')[$key],
                    'date'=> $request->input('dateStory')[$key],
                    'customer_id' => $customerId
                ]);
            }
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
        return redirect('/admin/customer');
    }

    public function edit($customerId){
        $bank = Bank::all();
        $theme = Theme::all();
        $data = Customer::find($customerId);
        // dd($data);
        // echo $data->bank2;
        // dd($customerId);
        return view('customer.form', compact(['data', 'bank', 'theme']));
    }

    public function update(Request $request, $customerId){
        // dd($request->all());
        $customer = Customer::find($customerId);
        $gallery = new Gallery;
        $customer->fullname_man = $request->input('manFullName');
        $customer->callname_man = $request->input('manCallName');
        $customer->order_man = $request->input('manOrder');
        $customer->fathername_man = $request->input('manFatherName');
        $customer->mothername_man = $request->input('manMotherName');
        $customer->fullname_woman = $request->input('womanFullName');
        $customer->callname_woman = $request->input('womanCallName');
        $customer->order_woman = $request->input('womanOrder');
        $customer->fathername_woman = $request->input('womanFatherName'); 
        $customer->mothername_woman = $request->input('womanMotherName');
        $customer->akad_date = $request->input('akadDate');
        $customer->akad_address = $request->input('akadAddress');
        $customer->link_akad_address = $request->input('akadAddressLink');
        $customer->resepsi_date = $request->input('resepsiDate');
        $customer->resepsi_address = $request->input('resepsiAddress');
        $customer->link_resepsi_address = $request->input('resepsiAddressLink');
        $customer->path = $request->input('path');
        $customer->theme_id = $request->input('theme');
        $customer->man_bank_id = $request->input('manBank');
        $customer->woman_bank_id = $request->input('womanBank');
        $customer->man_rek = $request->input('manRek');
        $customer->woman_rek = $request->input('womanRek');
        $customer->song = $request->input('song');
        if ($request->file('coupleImg')) {
            Storage::delete($customer->couple_img);
            $customer->couple_img = $request->file('coupleImg')->store($request->input('path'));
        }
        if ($request->file('manImg')) {
            Storage::delete($customer->man_img);
            $customer->man_img = $request->file('manImg')->store($request->input('path'));
        }
        if ($request->file('womanImg')) {
            Storage::delete($customer->woman_img);
            $customer->woman_img = $request->file('womanImg')->store($request->input('path'));
        
        }
        // if ($files = $request->file('gallery')) {
        //     $ubah = true;
        // }
        $ubahGallery = false;
        if($request->file('gallery')){
            $fingGallery = $gallery::where('customer_id', $customerId)->get();
            foreach ($fingGallery as $key => $v) {
                Storage::delete($v->img);
            }
            $gallery::where('customer_id', $customerId)->delete();
            $ubahGallery = true;
        }
        if($ubahGallery){
            foreach ($request->file('gallery') as $file) {
                $gallery::insert([
                    'img' => $file->store($request->input('path')),
                    'customer_id' => $customerId
                ]);
        //         // echo $file->store($request->input('path'));
            }
        }
        $stories = new Stories;
        foreach ($request->input('titleStory') as $key => $titleS) {
            // dd($body[$key]);
            if($titleS){
                $stories::updateOrInsert([
                    'title' => $titleS,
                    'body' => $request->input('bodyStory')[$key],
                    'date'=> $request->input('dateStory')[$key],
                    'customer_id' => $customerId
                ]);
            }
        }
        $customer->update();
        return redirect()->back();
    }

    public function destroy($customerId){
        $customer = Customer::find($customerId);
        $customer->delete();
        Storage::deleteDirectory($customer->path);
        Gallery::where('customer_id', $customerId)->delete();
        Stories::where('customer_id', $customerId)->delete();
        return redirect('/admin/customer');
    }

    public function deleteStory(Request $request){
        Stories::where('id', $request->id)->delete();
        return response()->json(['status'=>'200']);
    }
}
