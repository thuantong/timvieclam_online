<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class authAdmin
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
//        dd(Auth::check());
//        if (Auth::user() == null){
//            Session::flush();
//            return route('auth.form.login',array('admin'=>'true'));
//        }
//        if (Auth::check()) {
////            return $next($request);
//            return $next($request);
//        }else{
//            Session::flush();
//            return route('auth.form.login',array('admin'=>'true'));
//        }


//        if (!$request->expectsJson()) {
//            Session::flush();
//            return route('auth.form.login',array('admin'=>'true'));
//
//        }

    }
}
