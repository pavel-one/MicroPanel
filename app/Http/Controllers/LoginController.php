<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Аутентификация пользователя
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        //TODO: Add validation
        $username = $request->get('username');
        $password = $request->get('password');
        $remember = $request->get('remember');

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            return redirect()->route('index');
        }

        return response('Error auth')->json();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerView()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        //TODO: Add validation
        $username = $request->get('username');
        $email = $request->get('email');
        $name = $request->get('name');
        $password = $request->get('password');


        $created = User::create([
            'username' => $username,
            'email' => $email,
            'name' => $name,
            'password' => bcrypt($password),
        ]);

        if (!$created instanceof User) {
            \Log::alert("Ошибка создания пользователя: Request: \n".print_r($request->toArray()));
            return response('Error created user')->json();
        }

        Auth::loginUsingId($created->id, true);

        return redirect()->route('Dashboard index');


    }
}
