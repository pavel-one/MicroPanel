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
}
