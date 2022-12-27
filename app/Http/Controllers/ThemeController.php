<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function index(){
        $data = Theme::get();
        return response()->json([
            'code' => '200',
            'status' => 'OK',
            'data'    => $data
        ]);
    }

    public function store(Request $request){
        try {
            //set validation
            // $validator = Validator::make($request->all(), [
            //     'name'      => 'required'
            // ]);

            // //if validation fails
            // if ($validator->fails()) {
            //     return response()->json($validator->errors(), 422);
            // }

            //create
            $theme = new Theme;
            $theme->name = $request->input('name');
            $theme->save();

            //return response JSON is created
            if($theme) {
                return response()->json([
                    'code' => '200',
                    'status' => 'OK',
                    'data'    => $theme,  
                ], 201);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal tambah Theme',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function show(Theme $ThemeId){
        $theme = Theme::find($ThemeId)->first();
        return $ThemeId;
    }

    public function update(Request $request, Theme $ThemeId){
        try {
            // //set validation
            // $validator = Validator::make($request->all(), [
            //     'nama_Theme'      => 'required'
            // ]);

            // // if validation fails
            // if ($validator->fails()) {
            //     return response()->json($validator->errors(), 422);
            // }

            //update
            $theme = Theme::find($ThemeId)->first();
            $theme->id = $request->input('id');
            $theme->name = $request->input('name');
            $theme->update();

            //return response JSON pelanggan is created
            if($theme) {
                return response()->json([
                    'code' => '200',
                    'status' => 'OK',
                    'data'    => $theme,  
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'msg' => 'Gagal update Theme',
                'eror' =>  $th->getMessage(),
            ]);
        }
    }

    public function destroy(Theme $ThemeId)
    {
        $theme = Theme::find($ThemeId)->first();
        $theme->delete();
        return response()->json([
            'code' => '200',
            'status' => 'OK',
        ]);
    }
}
