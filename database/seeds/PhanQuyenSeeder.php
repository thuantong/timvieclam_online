<?php

use Illuminate\Database\Seeder;

class PhanQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phan_quyen')->insert([
            [
                'name' => 'Người tìm việc',
                'mo_ta' => 'Người tìm việc'
            ],
            [
                'name' => 'Nhà tuyển dụng',
                'mo_ta' => 'Nhà tuyển dụng'
            ],
            [
                'name' => 'Admin',
                'mo_ta' => 'Admin'
            ],

//            [
//                'name'=>'Đăng bài',
//                'mo_ta'=>'Đăng bài viết'
//            ],//đăng bài
//            [
//                'name'=>'Thêm tài khoản',
//                'mo_ta'=>'Quản lý tài khoản'
//            ],//quan lý tài khoản
//            [
//                'name'=>'Duyệt bài',
//                'mo_ta'=>'Duyệt bài viết'
//            ],//duyet bai
//            [
//                'name'=>'Sửa tài khoản',
//                'mo_ta'=>'Sửa tài khoản'
//            ],//quanlybaiviet
//            [
//                'name'=>'Sửa bài',
//                'mo_ta'=>'Sửa bài viết'
//            ],//quanlybaiviet
//            [
//                'name'=>'Xóa bài',
//                'mo_ta'=>'Xóa bài viết'
//            ],//quanlybaiviet
//            [
//                'name'=>'Khóa tài khoản',
//                'mo_ta'=>'Khóa tài khoản'
//            ],//quanlybaiviet
//            [
//                'name'=>'Tìm kiếm',
//                'mo_ta'=>'Chức năng tìm kiếm'
//            ],//quanlybaiviet
//            [
//                'name'=>'Thích',
//                'mo_ta'=>'thích bài viết'
//            ],//quanlybaiviet
//            [
//                'name'=>'quan tâm',
//                'mo_ta'=>''
//            ],//quanlybaiviet
        ]);
        //
    }
}
