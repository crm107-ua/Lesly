<?php

namespace App\Http\Middleware;

use Closure;

class CheckArtist
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
        if (!$request->user()->artist) {
            abort(403, "No tienes autorización para ingresar como artista");
        }
        return $next($request);
    }
}
