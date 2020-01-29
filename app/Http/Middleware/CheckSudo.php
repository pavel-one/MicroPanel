<?php

namespace App\Http\Middleware;

use Closure;

class CheckSudo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if (!$user->sudo) {
            return response()->json(['message' => 'Вам не хватает прав'], 401);
        }

        return $next($request);
    }
}
