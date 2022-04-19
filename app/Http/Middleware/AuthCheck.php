<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        
        
        // if(!Session()->has('LoggedUser') && ($request->path() != 'auth/login')){
        //     return redirect('auth/login')->with('failed','You must be logged in');
        // }

        // if(Session()->has('LoggedUser') && ($request->path() == 'auth/login')){
        //     return back();
        // }
        return $next($request);
    }
}
