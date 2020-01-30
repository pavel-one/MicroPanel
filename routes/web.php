<?php

use App\Http\Middleware\CheckActive;
use App\Http\Middleware\CheckSudo;

Route::get('/', 'PageController@index')->middleware('guest')->name('index');

//Авторизация/Регистрация
Route::group(['prefix' => 'login', 'middleware' => 'guest'], static function () {
    Route::get('/', 'LoginController@index')->name('sign in');
    Route::post('/', 'LoginController@authenticate')->name('login');

    Route::get('register', 'LoginController@registerView');
    Route::post('register', 'LoginController@register')->name('register');
});
Route::post('logout', 'LoginController@logout')->name('logout');

//Панель управления
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', CheckActive::class]], static function () {

    Route::get('/', 'DashboardController@index')
        ->name('Dashboard index');

    Route::get('users', 'DashboardController@users')
        ->middleware(CheckSudo::class)
        ->name('dashboard.users');

    Route::get('sorry', 'DashboardController@sorry')
        ->name('dashboard.sorry');

});

//Действия sudo
Route::group(['prefix' => 'sudo', 'middleware' => ['auth', CheckSudo::class]], static function () {

    Route::get('users', 'SudoController@getUsers')
        ->name('sudo.getusers');

    Route::get('user/auth/{user}', 'SudoController@authUser')
        ->name('sudo.authuser');

    Route::delete('user/delete/{user}', 'SudoController@deleteUser')
        ->name('sudo.deleteuser');

    Route::post('user/active', 'SudoController@activeUser')
        ->name('sudo.user.active');
});
