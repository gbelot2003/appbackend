<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        $response = $next($request);
        //If the status is not approved redirect to login
        if(Auth::user()->user_status !== true){
            Auth::logout();
            flash('Error, User invalid');
            return redirect('/login')->with('erro_login', 'Su usuario esta de baja');
        }
        return $response;
    }
}
