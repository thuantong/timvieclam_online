<?php

use Illuminate\Database\Seeder;

class DiaDiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dia_diem')->insert(array(
            array(
                'name' => 'Hà Nội'
            ), array(
                'name' => 'Hồ Chí Minh'
            ), array(
                'name' => 'Đà Nẵng'
            ), array(
                'name' => 'An Giang'
            ), array(
                'name' => 'Bà Rịa - Vũng Tàu'
            ), array(
                'name' => 'Bắc Giang'
            ), array(
                'name' => 'Bắc Kạn'
            ), array(
                'name' => 'Bạc Liêu'
            ), array(
                'name' => 'Bắc Ninh'
            ), array(
                'name' => 'Bến Tre'
            ), array(
                'name' => 'Bình Định'
            ), array(
                'name' => 'Bình Dương'
            ), array(
                'name' => 'Bình Phước'
            ), array(
                'name' => 'Bình Thuận'
            ), array(
                'name' => 'Cà Mau'
            ), array(
                'name' => 'Cần Thơ'
            ), array(
                'name' => 'Cao Bằng'
            ), array(
                'name' => 'Đắk Lắk'
            ), array(
                'name' => 'Đắc Nông'
            ), array(
                'name' => 'Điện Biên'
            ), array(
                'name' => 'Đồng Nai'
            ), array(
                'name' => 'Đồng Tháp'
            ), array(
                'name' => 'Gia Lai'
            ), array(
                'name' => 'Hà Giang'
            ), array(
                'name' => 'Hà Nam'
            ), array(
                'name' => 'Hà Tĩnh'
            ), array(
                'name' => 'Hải Dương'
            ), array(
                'name' => 'Hải Phòng'
            ), array(
                'name' => 'Hậu Giang'
            ), array(
                'name' => 'Hòa Bình'
            ), array(
                'name' => 'Hưng Yên'
            ), array(
                'name' => 'Khánh Hòa'
            ), array(
                'name' => 'Kiên Giang'
            ), array(
                'name' => 'Kon Tum'
            ), array(
                'name' => 'Lai Châu'
            ), array(
                'name' => 'Lâm Đồng'
            ), array(
                'name' => 'Lạng Sơn'
            ), array(
                'name' => 'Lào Cai'
            ), array(
                'name' => 'Long An'
            ), array(
                'name' => 'Nam Định'
            ), array(
                'name' => 'Nghệ An'
            ), array(
                'name' => 'Ninh Bình'
            ), array(
                'name' => 'Ninh Thuận'
            ), array(
                'name' => 'Phú Thọ'
            ), array(
                'name' => 'Phú Yên'
            ), array(
                'name' => 'Quảng Bình'
            ), array(
                'name' => 'Quảng Nam'
            ), array(
                'name' => 'Quảng Ngãi'
            ), array(
                'name' => 'Quảng Ninh'
            ), array(
                'name' => 'Quảng Trị'
            ), array(
                'name' => 'Sóc Trăng'
            ), array(
                'name' => 'Sơn La'
            ), array(
                'name' => 'Tây Ninh'
            ), array(
                'name' => 'Thái Bình'
            ), array(
                'name' => 'Thái Nguyên'
            ), array(
                'name' => 'Thanh Hóa'
            ), array(
                'name' => 'Thừa Thiên Huế'
            ), array(
                'name' => 'Tiền Giang'
            ), array(
                'name' => 'Trà Vinh'
            ), array(
                'name' => 'Tuyên Quang'
            ), array(
                'name' => 'Vĩnh Long'
            ), array(
                'name' => 'Vĩnh Phúc'
            ), array(
                'name' => 'Yên Bái'
            ), array(
                'name' => 'Nước ngoài'
            ),
        ));
    }
}
