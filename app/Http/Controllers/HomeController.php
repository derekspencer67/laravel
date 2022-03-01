<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function setCookie($themeId)
    {
        $theme = Theme::all()->where('id', '=', $themeId)->first();
        Cookie::queue(Cookie::make('theme', $theme->cdn_url, $theme->cdn_url));
        return redirect()->back();
    }
}
