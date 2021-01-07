<?php

namespace Illuminate\Foundation\Auth;


use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
use App\Models\QuanTriVien;
use App\Models\TaiKhoan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {

//        dd($request->has('admin') == false);
        if ($request->has('admin')){
            return view('Admin.Login.register');
        }
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        if ($request->has('ajaxCheck')){
            if ($this->validatorAjax($request->all()) == false){
                return $this->getResponse('Thêm mới tài khoản thất bại',400,'Tài khoản đã tồn tại!');
            }
        }else{
            $this->validator($request->all())->validate();
        }

        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

        $response = $this->registered($request, $user);
        if ($request->has('ajaxCheck')){
            return $this->getResponse('Thêm mới tài khoản',200,'Bạn vừa thêm mới tài khoản thành công!');
        }else{
            $message_register = 1;
            return redirect()->route('auth.form.login',['message_register'=>$message_register]);
        }

//        if ($request['loai_tai_khoan'] == 1) {//người tìm viec
//
//            return redirect()->route('user.nguoiTimViec');
//
//        } else if ($request['loai_tai_khoan'] == 2) {
//            return redirect()->route('user.nhaTuyendung');
//        }
//        return $request->wantsJson()
//                    ? new JsonResponse([], 201)
//                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The User has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
//        dd($request->has('admin'));
        if ($request->has('admin')){
            $findUser = TaiKhoan::query()->find($user->id);
            $quanTriVien = new QuanTriVien();
            $findUser->getQuanTriVien()->save($quanTriVien);
            $findUser->getPhanQuyen()->attach(3);
        }else{
            switch ($request['loai_tai_khoan']){
                case 1:
                    $findUser = TaiKhoan::query()->find($user->id);
                    //lấy quyền người tìm việc == 1
                    $findUser->getPhanQuyen()->attach($request['loai_tai_khoan']);
                    //lưu ảnh
                    $findUser->getNguoiTimViec()->save($this->userDetail($request->name,$request['loai_tai_khoan']));
                    return $findUser;
                case 2:
                    $findUser = TaiKhoan::query()->find($user->id);
                    //lấy quyền người tìm việc == 1
                    $findUser->getPhanQuyen()->attach($request['loai_tai_khoan']);
                    //ảnh
                    $findUser->getNhaTuyenDung()->save($this->userDetail($request->name,$request['loai_tai_khoan']));
                    return $findUser;
            }
        }

    }
    protected function userDetail($name,$type){
        if($type == 1){
            $nguoiTimViec = new NguoiTimViec();
//            $nguoiTimViec->ho_ten = $name;
            $nguoiTimViec->avatar = 'images/default-user-icon-8.jpg';
            return $nguoiTimViec;
        }else if ($type == 2){
            $nhaTuyenDung = new NhaTuyenDung();
//            $nhaTuyenDung->ho_ten = $name;
            $nhaTuyenDung->avatar = 'images/default-user-icon-8.jpg';
            return $nhaTuyenDung;
        }
    }
}
