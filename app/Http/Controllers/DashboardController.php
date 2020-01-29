<?php

namespace App\Http\Controllers;

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
}
