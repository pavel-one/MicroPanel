<?php

namespace App\Components;

use Illuminate\Http\JsonResponse;
use Route;
use Auth;

class Application
{

    public $config;

    public function __construct()
    {
        $this->config = [
            'user' => $this->getUser(),
            'routes' => $this->getRoutes(),
            'menu' => $this->getMenu(),
        ];
    }

    /**
     * Получает конфиг для VUE
     * @return string
     */
    public function getConfig(): string
    {
        return json_encode($this->config);
    }

    /**
     * Получает текущего пользователя
     * @return array
     */
    private function getUser(): array
    {
        $out = [];
        if (Auth::check()) {
            $user = Auth::getUser();
            $profile = $user->profile;
            $out = array_merge($user->toArray(), [
                'age' => $user->profile->getAge()
            ]);
            $out['profile'] = $profile->toArray();
        }
        return $out;
    }

    /**
     * Получает роуты по именам
     * @return array
     */
    private function getRoutes(): array
    {
        $routes = Route::getRoutes()->getRoutesByName();
        $out = [];

        /**
         * @var string $key
         * @var \Illuminate\Routing\Route $route
         */
        foreach ($routes as $key => $route) {
            if (strpos($route->uri, 'ignition') !== false) {
                continue;
            }
            $out[$key] = $route->uri;
        }

        return $out;
    }

    private function getMenu(): array
    {
        $out = [];
        $allMenu = getMenu();
        foreach ($allMenu as $menu) {
            if ($menu['sudo'] && !Auth::check()) {
                continue;
            }
            if ($menu['sudo'] && ((bool)Auth::user()->sudo !== true)) {
                continue;
            }

            $out[] = $menu;
        }

        return $out;
    }

    /**
     * @param string $message
     * @param bool $error
     * @return JsonResponse
     */
    public static function responseMessage($message = '', $error = false): JsonResponse
    {
        return response()->json(['message' => $message, 'error' => $error]);
    }
}
