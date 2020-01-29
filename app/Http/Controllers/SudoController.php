<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class SudoController extends Controller
{
    public function getUsers()
    {
        return User::all()
            ->filter(static function (User $user) {
                $user->authLink = $user->getAuthLink();
                $user->deleteLink = $user->getDeleteLink();
                return $user;
            });
    }

    /**
     * Авторизует пользователя
     * TODO: Сделать функцию возвращения пользователя
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authUser(User $user)
    {
        Auth::login($user);
        return redirect()->route('Dashboard index');
    }

    public function deleteUser(User $user)
    {
        $error = false;

        if ($user->delete()) {
            $message = __('dashboard.success');
        } else {
            $error = true;
            $message = __('dashboard.error');
        }

        return response()->json(['message' => $message, 'error' => false]);
    }


}
