<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
    }

    public function sorry()
    {
        return view('dashboard.sorry');
    }
}
