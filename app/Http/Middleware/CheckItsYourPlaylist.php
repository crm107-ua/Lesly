<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Playlist;

class CheckItsYourPlaylist
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
        return $next($request);
    }
}
