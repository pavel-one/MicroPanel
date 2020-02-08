<?php

namespace App\Http\Controllers;

use App\Components\Application;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
    }

    public function users()
    {
        return view('dashboard.users');
    }

    public function sorry()
    {
        return view('dashboard.sorry');
    }

    public function jobs()
    {
        return view('dashboard.jobs');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * Загрузка фото
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadPhoto(User $user, Request $request): JsonResponse
    {
        if (\Auth::user()->id !== $user->id) {
            return Application::responseMessage('Хацкер, не балуй', true);
        }

        /** @var UploadedFile $file */
        $file = $request->file('photo');
        if (!$file) {
            return Application::responseMessage('Нет файла', true);
        }

        try {
            $user->profile->uploadPhoto($file);
        } catch (\Exception $e) {
            return Application::responseMessage($e->getMessage(), true);
        }

        return Application::responseMessage('Успешно');
    }

    public function getPhoto(User $user)
    {
        $profile = $user->profile;
        if (!$profile) {
            throw new \Exception('Не найден профиль пользователя');
        }

        return $profile->getPhoto();
    }

    public function config()
    {
        $app = new Application();
        return $app->config;
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = \Auth::user();
        $rules = [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email|max:255',
            'name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'profile.address' => 'max:255',
            'profile.city' => 'max:255',
            'profile.country' => 'max:255',
            'profile.dob' => 'date',
        ];
        $userRequest = $request->toArray();
        $profileRequest = $request->post('profile');

        if ($request->post('username') === $user->username) {
            unset($rules['username']);
        }

        if ($request->post('email') === $user->email) {
            unset($rules['email']);
        }

        $request->validate($rules);

        if (!$user->update($userRequest)) {
            return Application::responseMessage('Не обновлено', true);
        }
        $user->profile->update($profileRequest);

        return Application::responseMessage('Успешно');
    }
}
