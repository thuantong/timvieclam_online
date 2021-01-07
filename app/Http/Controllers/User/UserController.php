<?php

namespace App\Http\Controllers\User;

use App\Mail\SendEmail;
use App\Models\TaiKhoan;
use App\Traits\NguoiTimViecTrait;
use App\Http\Controllers\Controller;
use App\Models\NguoiTimViec;
use App\Traits\NhaTuyenDungTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    use NguoiTimViecTrait,NhaTuyenDungTrait;
    public function __construct()
    {
        $this->middleware(['auth','email.confirm']);
    }

    public function index(){

    }

    public function doiMatKhau(Request $request)
    {
        $tatus_sucess = 'Thành công';
        $tatus_error = 'Thất bại';
//        return $request;
        if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password_old]) == true) {
            if ($request->password_new == $request->re_password_new) {
                $taiKhoanTim = TaiKhoan::query()->find(Auth::user()->id);
//                return $taiKhoanTim;
                if ($request->password_new == $request->password_old){
                    $message = 'Mật khẩu mới trùng với mật khẩu cũ';
                    $reset = 1;
                    return $response = $this->getResponse($tatus_sucess, 400, $message,$reset);
                }else{
                    $taiKhoanTim->password = bcrypt($request->password_new);
                    $taiKhoanTim->save();
                    $message = 'Mật khẩu đã được thay đổi thành công';
                    return $response = $this->getResponse($tatus_sucess, 200, $message);
                }
            } else {
                $message = 'Mật khẩu xác thực không chính xác';
                $reset = 1;
                return $response = $this->getResponse($tatus_error, 400, $message, $reset);
            }
        } else if (Auth::guard()->attempt(['email' => Auth::user()->email, 'password' => $request->password_old]) == false) {
            $message = 'Mật khẩu cũ không chính xác';
            $reset = 1;

            return $response = $this->getResponse($tatus_error, 400, $message, $reset);
        }

    }


    public function setAvatar(Request $request){
        $nguoiTimViec = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->first();
        $res = $request->fileName;

        $image_array_1 = explode(";", $res);
        $image_array_2 = explode(",", $image_array_1[1]);

        $image = base64_decode($image_array_2[1]);

        $imageName = $nguoiTimViec->id.$request->name;
        $path = public_path('images/'.$imageName);
        file_put_contents($path, $image);
        $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
        $taiKhoan->avatar = 'images/'.$imageName;
        $taiKhoan->save();
        $nguoiTimViec->avatar = 'images/'.$imageName;
        $nguoiTimViec->save();
        Session::put('avatar',$taiKhoan->avatar);
        return response('images/'.$imageName);

    }

}
