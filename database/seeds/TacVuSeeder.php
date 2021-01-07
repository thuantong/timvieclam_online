<?php

use Illuminate\Database\Seeder;

class TacVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tac_vu')->insert(
            array(
                array(
                    'name' => 'Tìm kiếm',
                ),
                array(
                    'name' => 'Tìm kiếm mức lương',
                ),
                array(
                    'name' => 'Xem bài tuyển dụng',
                ),
                array(
                    'name' => 'Nộp đơn',
                ),
                array(
                    'name' => 'Lưu việc',
                ),
                array(
                    'name' => 'Quan tâm nhà tuyển dụng',
                ),
                array(
                    'name' => 'Xem chi tiết bài tuyển dụng',
                ),
                array(
                    'name' => 'Quản lý thông tin cá nhân(Người tìm việc)',
                ),
                array(
                    'name' => 'Xem việc làm đã lưu',
                ),
                array(
                    'name' => 'Kiểm tra công việc đã ứng tuyển',
                ),
                array(
                    'name' => 'Đánh giá nhà tuyển dụng',
                ),
                //nhà tuyển dụng
                array(
                    'name' => 'Đăng bài tuyển dụng',
                ),
                array(
                    'name' => 'Quản lý thông tin cá nhân(Nhà tuyển dụng)',
                ),
                array(
                    'name' => 'Quản lý bài tuyển dụng',
                ),
                array(
                    'name' => 'Quản lý ứng viên',
                ),
                array(
                    'name' => 'Đăng ký duyệt bài nhanh',
                ),
                array(
                    'name' => 'Đăng ký bài hot',
                ),
                array(
                    'name' => 'Nạp tiền',
                ),
                array(
                    'name' => 'Quản lý duyệt tin',
                ),
                array(
                    'name' => 'Quản lý tài khoản',
                ),
                array(
                    'name' => 'Tìm kiếm nhà tuyển dụng',
                ),
                array(
                    'name' => 'Tìm kiếm người tìm việc',
                ),


            )
        );
        //
    }
}
