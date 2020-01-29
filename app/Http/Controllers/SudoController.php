<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SudoController extends Controller
{
    public function getUser()
    {
        return User::all();
    }


}
