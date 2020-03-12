<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class PageController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function test()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function test1(Request $request)
    {
        $user = Socialite::driver('vkontakte')->user();
        $id = $user->getId();
        $token = $user->token;

        $query = http_build_query([
            'album_id' => 'profile',
            'owner_id' => $id,
            'rev' => 1,
            'extended' => 1,
            'photo_sizes' => 0,
            'access_token' => $token,
            'count' => 1,
            'v' => 5.103
        ]);
        $response = json_decode(file_get_contents('https://api.vk.com/method/photos.get?'.$query), true);

        dd($user, $user->getAvatar(), $query, $response);
    }
}
