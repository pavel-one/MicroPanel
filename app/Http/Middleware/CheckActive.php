<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckActive
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route() !== null
            ? $request->route()->getName()
            : '';
        $active = Auth::user()->active;

        if ($active && $routeName === 'dashboard.sorry') { //Редирект если пользователя уже активровали
            return redirect()->route('Dashboard index');
        }

        if ($routeName === 'dashboard.sorry' || $active) {
            return $next($request);
        }
        return redirect()->route('dashboard.sorry');
    }
}
