<?php

namespace App\Http\Middleware;

use App\Models\TaiKhoan;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmailConfim
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

        $emailConfirm = Auth::user()->email_confirmed;
        if ($emailConfirm == null){
            return redirect()->route('auth.confirmEmailView');
        }
        return $next($request);
    }
}
