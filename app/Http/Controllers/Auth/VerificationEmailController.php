<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VerificationEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirmEmailView(){

        if (Auth::user()->email_confirmed != null){

            switch (intval(Session::get('loai_tai_khoan'))){
                case 1:
                    return redirect('/');
                case 2:
                    return redirect()->route('user.nhaTuyenDung');
                case 3:
                    return redirect()->route('admin.index');
            }
        }else{
            return view('auth.verify');
        }
    }
    //
}
