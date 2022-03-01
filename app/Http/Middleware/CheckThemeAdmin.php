<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckThemeAdmin
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
                if (Auth::check() && $userRole === null || Auth::check() && $userRole->id === 3) {
                    return $next($request);
                }
            }
        }
            $request->session()->flash('deny', 'Denied. You do not have permission to access Theme Management.');
            return redirect('/');



    }
}
