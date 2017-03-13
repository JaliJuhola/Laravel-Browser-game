<?php

namespace App\Http\Middleware;

use App\Player;
use Closure;
use Illuminate\Support\Facades\Auth;
class AccountVerified
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
        if (Player::where('user_id', Auth::user()->id)->count() === 0) {
            return redirect('/player/create');
        }
        return $next($request);
    }
}
