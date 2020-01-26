<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Query\QueryException;
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
        //TODO: Add validation
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

        $this->log('Ошибка авторизации', self::LOG_CHANNEL, $request->toArray());

        return back()->withErrors(['auth' => __('auth.failed')]);
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

        $this->validate($request, [
            'username' => 'required|unique:users',
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
            //Что то работает TODO: Протестировать
            \Log::critical('', '');
            \Log::alert("$e: Request: \n" . print_r($request->toArray(), true));
            return response('Редирект на ошибку');
        }

        if (!$created instanceof User) {
            \Log::alert("Ошибка создания пользователя: Request: \n" . print_r($request->toArray(), true));
            return response('Error created user')->json();
        }

        Auth::loginUsingId($created->id, true);

        return redirect()->route('Dashboard index');


    }
}
