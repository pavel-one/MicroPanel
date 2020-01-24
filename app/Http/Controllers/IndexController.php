<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        Log::info('Test Log');
        return view('welcome');
    }
}
