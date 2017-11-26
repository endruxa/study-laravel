<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
class AdminMiddlewre
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
        $user = $request->user(); // \Auth::user();
        if($user && $user->role == User::ROLE_ADMIN){
            return $next($request);
        }
        abort(403, 'Access denied');
    }
}
