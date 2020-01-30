<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class SudoController extends Controller
{
    /**
     * Метод получения пользователей
     * @return User[]|Collection
     */
    public function getUsers()
    {
        return User::all()
            ->filter(static function (User $user) {
                $user->setAttribute('authLink', $user->getAuthLink());
                $user->setAttribute('deleteLink', $user->getDeleteLink());
                return $user;
            });
    }

    /**
     * Авторизует пользователя
     * TODO: Сделать функцию возвращения пользователя
     * @param User $user
     * @return RedirectResponse
     */
    public function authUser(User $user): RedirectResponse
    {
        Auth::login($user);
        return redirect()->route('Dashboard index');
    }

    /**
     * Удаление пользователя
     * @param User $user
     * @return JsonResponse
     * @throws \Exception
     */
    public function deleteUser(User $user): JsonResponse
    {
        $message = __('dashboard.success');
        $error = false;

        if (!$user->delete()) {
            $error = true;
            $message = __('dashboard.error');
        }

        return $this->responseMessage($message, $error);
    }

    /**
     * Активация/Деактивация пользователя
     * @param User $user
     * @return JsonResponse
     */
    public function activeUser(User $user): JsonResponse
    {
        $message = __('dashboard.success');
        $error = false;

        if (!$user->update(['active' => !$user->active])) {
            $message = __('dashboard.error');
            $error = true;
        }

        return $this->responseMessage($message, $error);
    }


    /**
     * @param string $message
     * @param bool $error
     * @return JsonResponse
     */
    public function responseMessage($message = '', $error = false): JsonResponse
    {
        return response()->json(['message' => $message, 'error' => $error]);
    }


}
