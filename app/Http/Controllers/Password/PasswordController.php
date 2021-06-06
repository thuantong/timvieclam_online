<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\PasswordReset;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function quenMatKhau(){
//        dd(rand(100000,999999));
//        return view('auth.passwords.reset');
        return view('auth.passwords.email');
    }
    public function guiMaXacNhan(Request $request){
        $dataNewAll = $request->all();
        $email = $dataNewAll['email'];
        $newCode = rand(100000,999999);
        $myCode = $newCode;
        $timKiem = PasswordReset::query()->where('email',$email)->first();
    //    dd($timKiem);

        if ($timKiem != null){
            $newConfirm = new PasswordReset();
            $newConfirm->email = $email;
            $newConfirm->token = $myCode;
            $newConfirm->save();
            $dataEmail = array(
                'subject' => ucwords('Reset password'),
                'view' => 'auth.passwords.mail.reset_password',
                'data' => array(
                    'code'=>$myCode
                ),
            );
            $sendEmail = $newConfirm->email;
            dd($sendEmail);
            Mail::to($sendEmail)->send(new SendEmail($dataEmail));
        }else{
//            echo "<script>alert('Bạn đã gửi rồi')</script>";
        }
        return view('auth.passwords.reset');
//        dd($request->all());
    }
    public function thayDoiMatKhau(Request $request){
        $requestData = $request->all();
        $validate = $this->checkRule($requestData)->validate();

        $checkCode = PasswordReset::query()->where('email',$requestData['email'])->where('token',$requestData['new_code'])->first();
        if ($checkCode == null){
            return redirect()->back()->withErrors(['new_code_check'=>'Mã code không trùng khớp']);
        }
        $timTaiKhoan = TaiKhoan::query()->where('email_confirmed',$checkCode->email)->first();
        $timTaiKhoan->password = Hash::make($requestData['password']);
        $timTaiKhoan->save();
        $checkCode->delete();
//        PasswordReset::query()->where('email',$requestData['email'])->delete();
        return redirect()->route('auth.form.login');
//        dd($timTaiKhoan);
    }

    public function checkRule(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string','email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_code' => ['required', 'max:6','min:6'],
        ],array(
            'new_code.required'=>'Mã code không được để trống',
            'new_code.max'=>'Mã code tối đa 6 ký tự',
            'new_code.min'=>'Mã code ít nhất 6 ký tự',
        ));
    }
//    public function
}
