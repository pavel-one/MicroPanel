<?php

namespace App\Http\Controllers;

use App\User;

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

    public function uploadPhoto(User $user)
    {
        return $user->profile->uploadPhoto();
    }
}
