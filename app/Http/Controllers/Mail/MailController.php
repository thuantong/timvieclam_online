<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmailUser;
use App\Mail\SendEmail;
use App\Models\DonXinViec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function xacThucTaiKhoan(){
        $dataEmail = array(
            'subject'=>ucwords('Xác thực tài khoản'),
            'view'=>'TaiKhoan.xacThucEmail'
        );
        $check = Mail::to('tongminhthuan040122225@gmail.com')->send(new SendEmail($dataEmail));
//        redirect
        dd($check);
    }
    public function xacThucPhongVan(Request $request){
        $token = $request->get('token');
        $donXinViecAll = DonXinViec::query()->where('_token','!=',null)->get();
        $objFillter = null;
        foreach ($donXinViecAll as $row){
            if (Hash::check($token,$row->_token)){
                $objFillter = $row;
                break;
            }
        }
        if ($objFillter == null){
            echo "Liên kết đã hết hạn";
//            echo "<script>setTimeout(function() {
//              location.href='/';
//            },1000*1.5)</script>";
            return;
        }else{
            $idDonXinViec = $objFillter->id;
            $donXinViec = DonXinViec::query()->find($idDonXinViec);
            $donXinViec->status = 2;
            $donXinViec->_token = null;
            $donXinViec->save();
            echo "Xác nhận phỏng vấn thành công";
            echo "<script>setTimeout(function() {
              location.href='/';
            },1000*1.5)</script>";
            return;
//            dd($donXinViec);
        }
//dd($donXinViec[0]->_token,$token,Hash::check($token,$donXinViec[0]->_token));
//        dd($objFillter->id);
    }
}
