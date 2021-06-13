<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\TaiKhoan;
use App\Traits\LoginTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

//use Illuminate\Http\JsonResponse;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class MyLoginController extends Controller
{
    use LoginTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //-STEP 1: get form login
    public function showLoginForm(Request $request)
    {
        if ($request->has('admin')) {
            return view('Admin.Login.login');
        } else {
            if ($request->get('message_register') != null && $request->get('message_register') == 1) {
                $message_register = 'Tạo tài khoản thành công! Nhập lại tài khoản vừa tạo!';
                return view('auth.login', compact('message_register'));
            } elseif ($request->get('message_register') != 1 && $request->get('message_register') != null) {
//                abort(404);
                return redirect('/');
            } elseif ($request->get('message_register') == null) {
                return view('auth.login');
            }
        }

    }
    //-STEP 2: chức năng đăng nhập
    public function login(Request $request)
    {
        //-B1: validate
        $this->validateLogin($request->all())->validate();
//        dd($request->all());
        //-B2: login Authenlication //Thành công
        if ($this->attemptLogin($request)) {
            //xử lý sau khi login thành công Authenlication
            return $this->sendLoginResponse($request);
        }
        //login Authenlication //Thất bại
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(array $request)
    {
        return Validator::make($request, [
            $this->username() => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],

        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        //B1: Lưu trạng thái tài khoản
        $findUser = TaiKhoan::query()->find(Auth::user()->id);
//        dd($findUser->status);
        if ($findUser->status == 2){
            Session::flush();
            return redirect()->route('taikhoan.thongBaoKhoaTaiKhoan');
        }

        $findUser->status = 1;
        $findUser->save();
        //enb - B1

        //B2: Lấy phân quyền
        $getPhanQuyen = PhanQuyen::query()->find($findUser->getPhanQuyenId())->first();
        Session::put('role', $getPhanQuyen->getTacVuId());
        Session::put('loai_tai_khoan', $getPhanQuyen['id']);
        if ($findUser->email_confirmed == null){
            return redirect()->route('auth.confirmEmailView');
        }
        switch ($getPhanQuyen['id']) {
            case 1://Người tìm việc
                $nguoiTimViec = $findUser->getNguoiTimViec;
                $soDu = $nguoiTimViec->getSoDu;

                //check và lưu số dư
                if ($soDu != null) {
                    Session::put('so_du', $soDu['tong_tien']);
                }

                //Lưu avatar
                Session::put('avatar', $nguoiTimViec['avatar']);
                //Check email chưa confirm
                


                //pass all step
                if (Session::exists('url_previos') == true && Session::get('url_previos') != null){
                    return redirect(Session::get('url_previos'));
                }else{
                    return redirect('/');
                }
//                return redirect()->back();
//                return back();
            case 2:
                $nhaTuyenDung = $findUser;
                $soDu = $nhaTuyenDung->getSoDu;
                // dd($soDu);
                //check và lưu số dư
                if ($soDu != null) {
                    Session::put('so_du', $soDu['tong_tien']);
                }

                //Lưu avatar
                Session::put('avatar', $nhaTuyenDung['avatar']);

                //Check email chưa confirm
                // if ($findUser->email_confirmed == null){
                //     return redirect()->route('auth.confirmEmailView');
                // }

                //pass all step
                if (Session::exists('url_previos') == true && Session::get('url_previos') != null){
                    return redirect(Session::get('url_previos'));
                }else{
                    return redirect()->route('user.nhaTuyenDung');

                }
//                return redirect()->back();
//            dd(URL::previous());
//            dd(redirect()->back());
//                return redirect()->back();

            case 3:
                $quanTriVien = $findUser->getQuanTriVien;

                //Check email chưa confirm
                // if ($findUser->email_confirmed == null){
                //     return redirect()->route('auth.confirmEmailView');
                // }

                //pass all step
                return redirect()->route('admin.index');
        }

    }

    public function logout(Request $request)
    {
//        dd(URL::previous());
        //Step 1: Cập nhật trạng thái
        if (Auth::user() != null){
            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
            if (Auth::user()->status != 2){
                $taiKhoan->status = 0;
                $taiKhoan->save();
            }

        }

        //Step 2: Logout
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        if ($request->has('admin') == true){
            return redirect()->route('auth.form.login',['admin']);
        }else{
//            dd(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName());
//            dd(\Illuminate\Support\Facades\Request::route(URL::previous())->getName());
            if (app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() != 'nhantin.index'){
                Session::put('url_previos',URL::previous());
            }

            return redirect()->route('auth.form.login');
        }

    }

}
