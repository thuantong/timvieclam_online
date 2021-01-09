<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TaiKhoan extends Authenticatable
{
    use Notifiable;
    protected $table = 'tai_khoan';
    protected $primaryKey  = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ho_ten',
        'email',
        'user_name',
        'email_confirmed',
        'email_verify',
        'password',
        'phone',
        'status',
        'email_verify_code',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        'status' => 0,
    ];

    //lấy phân quyền
    public function getPhanQuyen(){
        return $this->belongsToMany(PhanQuyen::class,'phan_quyen_tai_khoan','tai_khoan_id','phan_quyen_id');
    }
    public function getPhanQuyenId(){
        return $this->getPhanQuyen->pluck('id');
    }

    //get thông tin người tìm việc
    public function getNguoiTimViec(){
        return $this->hasOne(NguoiTimViec::class,'tai_khoan_id');
    }
    public function getNguoiTimViecId(){
        return $this->getNguoiTimViec->pluck('id');
    }

    //get thông tin nhà tuyển dụng
    public function getNhaTuyenDung(){
        return $this->hasOne(NhaTuyenDung::class,'tai_khoan_id');
    }
    public function getNhaTuyenDungId(){
        return $this->getNhaTuyenDung->pluck('id');
    }

    public function getQuanTriVien(){
        return $this->hasOne(QuanTriVien::class,'tai_khoan_id');
    }
    public function getTinNhan(){
        return $this->hasMany(TinNhan::class,'tai_khoan_id');
    }
//    public function phan_quyens(){
//        return $this->belongsToMany(PhanQuyen::class, 'loai_tai_khoan','account_id','role_id');
////        return $this->hasMany(LoaiTaiKhoan::class,'account_id');
//    }
//    public function nguoi_tim_viecs(){
//        return $this->hasOne(NguoiTimViec::class,'tai_khoan_id');
//    }
//    public function nha_tuyen_dungs(){
//        return $this->hasOne(NhaTuyenDung::class,'tai_khoan_id');
//    }
//    public function getPhanQuyenIdsAttribute()
//    {
//        return $this->phan_quyens->pluck('id');
//    }

}
