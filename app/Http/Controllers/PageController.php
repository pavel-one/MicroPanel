<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class PageController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function test()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function test1(Request $request)
    {
        $code = $request->get('code');
        Socialite::driver('vkontakte')->user();
        dd($code);
    }
}
