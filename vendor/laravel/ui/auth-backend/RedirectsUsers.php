<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
//    public function redirectRole($role){
//        if($role == 1){//người tìm viec
//            view('User.nguoiTimViec');
//        }else if ($role == 2){
//                dd('hà tuyển dụng');
//        }
//    }
}
