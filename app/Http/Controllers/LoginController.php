<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('index');
        }

        return response('Error auth')->json();
    }
}
