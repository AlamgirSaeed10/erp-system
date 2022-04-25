<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
use Session;
use URL;
use DB;
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
        
        // dd(Session()->get('FullName'));
        // if (session::get('EmployeeID')) {
        //     return redirect('/login')->with('error', 'Session expired')->with('class', 'danger');
           
        // } else {
            
        //     return $next($request);
        // }
            return $next($request);
    }
}
