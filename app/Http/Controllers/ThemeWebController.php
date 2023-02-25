<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use Illuminate\Support\Facades\Storage;
class ThemeWebController extends Controller
{
    public function index(){
        $data = Theme::all();

        return view('theme.index', compact(['data']));
    }

    public function create(){
        $theme = Theme::all();
        $data = null;
        return view('theme.form', compact(['data', 'theme']));
    }

    public function store(Request $request){
        // dd($request->all());
        $theme = new Theme;
        $theme->name = $request->input('nameTheme');

        $theme->save();
        return redirect('/admin/theme');
    }

    public function edit($themeId){
        $data = Theme::find($themeId);
        // dd($data);
        // echo $data->theme2;
        // dd($customerId);
        return view('theme.form', compact(['data']));
    }

    public function update(Request $request, $themeId){
        // dd($request->all());
        $theme = Theme::find($themeId);

        $theme->name = $request->input('nameTheme');
        $theme->update();
        return redirect('/admin/theme');
    }

    public function destroy($themeId){
        $theme = Theme::find($themeId);
        $theme->delete();
        return redirect('/admin/theme');
    }

}
