<?php
namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

trait LoginTrait{

    protected function guard()
    {
        return Auth::guard();
    }
    public function username()
    {
        return 'user_name';
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
}
