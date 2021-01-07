<?php
//
//namespace App;
//
//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
//
//class User extends Authenticatable
//{
//    use Notifiable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'email', 'password','phone','loai_tai_khoan','remember_token','avatar'
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
//
//    /**
//     * The attributes that should be cast to native types.
//     *
//     * @var array
//     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
//    protected $attributes = [
//        'status' => 1,
//        'status_text' => "Đang hoạt động",
//    ];
//
//    public function nguoiTimViec(){
//        return $this->hasOne('App\Models\NguoiTimViecModel');
//    }
//}
