<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAdmin
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
//        dd(Session::get('loai_tai_khoan'));
        if (Session::get('loai_tai_khoan') != 3){
            return redirect('/');
        }
        return $next($request);
    }
}
