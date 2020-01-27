<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{

    public const LOG_CHANNEL = 'auth';

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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $remember = $request->get('remember');

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            return redirect()->route('Dashboard index');
        }

        $this->log(__('auth.AuthUserProcess'), self::LOG_CHANNEL, $request->toArray());

        return back()->withErrors(['auth' => __('auth.failed')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerView()
    {
        return view('login.register');
    }

    /**
     * Регистрация пользователя
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $username = $request->get('username');
        $email = $request->get('email');
        $name = $request->get('name');
        $password = $request->get('password');

        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required',
        ]);

        $created = null;

        try {
            $created = User::create([
                'username' => $username,
                'email' => $email,
                'name' => $name,
                'password' => bcrypt($password),
            ]);
        } catch (\Exception $e) {
            $this->log(__('auth.CreateUserProcess'), self::LOG_CHANNEL, array_merge([
                'msg' => __('auth.UnknownErrorCreateUser')
            ], $request->toArray()));

            return back()->withErrors([
                'register' => __('auth.UnknownErrorCreateUser')
            ]);
        }

        Auth::login($created, true); //Авто авторизация

        return redirect()->route('Dashboard index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

}
