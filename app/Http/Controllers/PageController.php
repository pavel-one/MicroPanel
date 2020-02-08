<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function test()
    {
        $profile = UserProfile::find(1)->first();
        return $profile->getPhoto();
    }
}
