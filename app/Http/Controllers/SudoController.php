<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\ErrorJob;
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
        return User::all();
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
        if ($user->sudo) {
            return $this->responseMessage('Нельзя удалить sudo пользователя', true);
        }

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
        if ($user->sudo) {
            return $this->responseMessage('Нельзя деактивировать sudo пользователя', true);
        }
        return $user->activeDeactivation();
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

    /**
     *
     * @return Job[]|Collection
     */
    public function getJobs()
    {
        return Job::all();
    }

    /**
     * @return ErrorJob[]|Collection
     */
    public function getErrorJobs()
    {
        return ErrorJob::all();
    }


}
