<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Object_;

class CheckRole
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
        //dd(Auth::user()->roles->first());
        if(Auth::user()->roles->first() !== null) {
            $userRoles = Auth::user()->roles;
            foreach ($userRoles as $userRole) {
                if (Auth::check() && $userRole === null || Auth::check() && $userRole->id === 1) {
                    return $next($request);
                }
            }
        }

            $request->session()->flash('deny', 'Denied. You do not have permission to access User Management.');
            return redirect('/');



    }
}
