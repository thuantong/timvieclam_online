<?php

namespace App\Http\Controllers\TaiKhoan;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\HangMucThanhToan;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ConfirmEmailController extends Controller
{
    public function __construct()
    {
//            $this->middleware(function ($request, $next) {
//
//                return $next($request);
//            });
    }

    public function sendVerifyEmail(Request $request)
    {
        $dataAjax = $request->toArray();
        $title = 'Gửi xác thực';

        try {
            $__stringRandom = Str::random('20') . date('d') . Str::random('20') . date('m') . Str::random('20') . date('Y') . Str::random('40');
            $__token = $__stringRandom;
            $taiKhoan = TaiKhoan::query()->find($dataAjax['action']);
            $taiKhoan->email = $dataAjax['email'];
            $taiKhoan->email_verify_code = $__token;
            $taiKhoan->save();
            $__data = $taiKhoan->toArray();
            $__data['token'] = $__stringRandom;
            $dataEmail = array(
                'subject' => ucwords('Xác thực tài khoản'),
                'view' => 'TaiKhoan.xacThucEmail',
                'data' => $__data
            );

            Mail::to($taiKhoan->email)->send(new SendEmail($dataEmail));
            return $this->getResponse($title, 200, 'Vui lòng kiểm tra hộp thư email: ' . $taiKhoan->email);
        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, $exception->getMessage());
        }
    }

    public function kichHoatTaiKhoan($token)
    {

        try {


            $taiKhoan = TaiKhoan::query()->where('email_verify_code',$token)->first();
            // dd($taiKhoan);
        
            if($taiKhoan != null){
                if($taiKhoan->email_confirmed == null || $taiKhoan->email_confirmed != $taiKhoan->email){
                    if ($taiKhoan->email_verify_code == null) {
                        switch (intval(Session::get('loai_tai_khoan'))) {
                            case 1:
                                return redirect('/');
                            case 2:
                                return redirect()->route('user.nhaTuyenDung');
                            case 3:
                                return redirect()->route('admin.index');
                        }
                    } else {
                        if ($token == $taiKhoan->email_verify_code) {
                            $taiKhoan->email_confirmed = $taiKhoan->email;
                            $taiKhoan->email_verified_at = Carbon::now()->timestamp;
                            $taiKhoan->email_verify_code = null;
                            $taiKhoan->save();
                            $status = 200;
                            if (Auth::user() == null) {
                                return redirect()->route('auth.logout');
                            }
                            $message = 'Xác thực tài khoản thành công! Trang web đang chuyển hướng!';
                            return view('TaiKhoan.thongBaoXacThuc', compact('message', 'status'));
                        } else {
                            $status = 400;
                            $message = 'Xác thực tài khoản thất bại!';
                            return view('TaiKhoan.thongBaoXacThuc', compact('message', 'status'));
                        }
                    }
                }else{
                    $status = 400;
                    $message = 'Tài khoản đã được xác nhận!';
                    return view('TaiKhoan.thongBaoXacThuc', compact('message', 'status'));
                }

            }


        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

    }
    public function thongBaoKhoaTaiKhoan(){
        return view('TaiKhoan.thongBaoKhoaTaiKhoan');
    }
}
