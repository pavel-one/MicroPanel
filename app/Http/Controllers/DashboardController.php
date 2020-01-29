<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
class DashboardController extends Controller
{

    public function index()
    {
        $menu = json_encode([
            [
                'name' => 'Общее',
                'route' => 'Dashboard index',
                'link' => route('Dashboard index'),
            ],
            [
                'name' => 'Страница ошибки',
                'route' => 'dashboard.sorry',
                'link' => route('dashboard.sorry')
            ]
        ]);
        $currentRoute = Route::currentRouteName();
        return view('dashboard.index', compact('menu', 'currentRoute'));
    }

    public function sorry()
    {
        return view('dashboard.sorry');
    }
}
