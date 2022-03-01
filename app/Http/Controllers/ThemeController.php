<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;


class ThemeController extends Controller
{

    public function __construct(Request $request)
    {

        $this->middleware('auth');
        $this->middleware('checkThemeAdmin');

    }

    public function index()
    {
        $themes = Theme::all();

        return view('themes.index', compact('themes'));
    }

    public function create()
    {
        return view('themes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cdn_url' => 'required',
            'created_by' => 'required',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Theme::create($request->all());

        $request->session()->flash('status', 'Theme Created.');

        return redirect('/themes');
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required',
            'cdn_url' => 'required',
            'created_by' => 'required',
            'updated_at' => now()
        ]);
        //dd($data);

        $theme->update($request->all());

        $request->session()->flash('status', 'Theme Updated.');

        return redirect('/themes');
    }

    public function destroy(Request $request, Theme $theme)
    {
        $theme->delete();

        DB::table('themes')->where('id','=',$theme->id)->update([
            'deleted_by' => Auth::id()
        ]);

        $request->session()->flash('deny', 'Theme Deleted.');

        return redirect('/themes');
    }

}
