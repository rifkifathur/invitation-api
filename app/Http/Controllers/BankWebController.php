<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Theme;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Stories;
use Illuminate\Support\Facades\Storage;
class BankWebController extends Controller
{
    public function index(){
        $data = Bank::all();

        return view('bank.index', compact(['data']));
    }

    public function create(){
        $bank = Bank::all();
        $data = null;
        return view('bank.form', compact(['data', 'bank']));
    }

    public function store(Request $request){
        // dd($request->all());
        $bank = new Bank;
        $bank->name = $request->input('nameBank');
        if ($files = $request->file('logoBank')) {
            $bank->logo = $files->store('bankLogo');
        }

        $bank->save();
        return redirect('/admin/bank');
    }

    public function edit($bankId){
        $data = Bank::find($bankId);
        // dd($data);
        // echo $data->bank2;
        // dd($customerId);
        return view('bank.form', compact(['data']));
    }

    public function update(Request $request, $bankId){
        // dd($request->all());
        $bank = Bank::find($bankId);
        $ubah = false;

        $bank->name = $request->input('nameBank');
        if ($files = $request->file('logoBank')) {
            $ubah = true;
        }
        if ($ubah){
            Storage::delete($bank->logo);
            $bank->logo = $files->store('bankLogo');
        }
        $bank->update();
        return redirect('/admin/bank');
    }

    public function destroy($bankId){
        $bank = Bank::find($bankId);
        $bank->delete();
        Storage::delete($bank->logo);
        return redirect('/admin/bank');
    }

}
