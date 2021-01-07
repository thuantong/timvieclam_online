<?php

namespace App\Http\Middleware;

use App\Models\PhanQuyen;
use App\Models\TaiKhoan;
use Closure;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CheckSoDu
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
        $findUser = TaiKhoan::query()->find(Auth::user()->id);
        $getPhanQuyen = PhanQuyen::query()->find($findUser->getPhanQuyenId())->first();
//        dd($getPhanQuyen['id']);
        switch ($getPhanQuyen['id']) {
            case 1:
                $nguoiTimViec = $findUser->getNguoiTimViec;
                Session::put('so_du',$nguoiTimViec->getSoDu);
//                View::share('so_du', 'aaaa');
                Session::put('avatar', $nguoiTimViec['avatar']);
                return redirect('/');
            case 2:
                $nhaTuyenDung = $findUser->getNhaTuyenDung;
                Session::put('so_du',$nhaTuyenDung->getSoDu);

//                View::share('so_du', 'aaaa');
                Session::put('avatar', $nhaTuyenDung['avatar']);
                return redirect()->route('user.nhaTuyenDung');
            case 3:
                dd('Admin');
        }
        return $next($request);
    }
}
