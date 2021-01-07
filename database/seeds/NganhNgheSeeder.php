<?php

use Illuminate\Database\Seeder;

class NganhNgheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nganh_nghe')->insert(array(
            array(
                'name' => 'Công Nghệ Thông Tin',
                'mo_ta' => 'Công Nghệ Thông Tin',
            ), array(
                'name' => 'Quảng cáo/Marketing/PR',
                'mo_ta' => 'Quảng cáo/Marketing/PR',
            ), array(
                'name' => 'Kinh Doanh/Bán Hàng',
                'mo_ta' => 'Kinh Doanh/Bán Hàng',
            ), array(
                'name' => 'Nhân Sự/Hành Chính',
                'mo_ta' => 'Nhân Sự/Hành Chính',
            ), array(
                'name' => 'Khách Sạn & Nhà Hàng',
                'mo_ta' => 'Khách Sạn & Nhà Hàng',
            ), array(
                'name' => 'Giáo Dục/Đào Tạo',
                'mo_ta' => 'Giáo Dục/Đào Tạo',
            ), array(
                'name' => 'Kế Toán/Kiểm Toán',
                'mo_ta' => 'Kế Toán/Kiểm Toán',
            ), array(
                'name' => 'Nông Lâm/Ngư nghiệp',
                'mo_ta' => 'Nông Lâm/Ngư nghiệp',
            ), array(
                'name' => 'Vận Tải/Giao Nhận/Kho Vận',
                'mo_ta' => 'Vận Tải/Giao Nhận/Kho Vận',
            ), array(
                'name' => 'Y Tế',
                'mo_ta' => 'Y Tế',
            ), array(
                'name' => 'Lao Động Phổ Thông',
                'mo_ta' => 'Lao Động Phổ Thông',
            ), array(
                'name' => 'Dịch Vụ',
                'mo_ta' => 'Dịch Vụ',
            ), array(
                'name' => 'Tài Chính/Ngân Hàng',
                'mo_ta' => 'Tài Chính/Ngân Hàng',
            ), array(
                'name' => 'Kỹ Thuật',
                'mo_ta' => 'Kỹ Thuật',
            ), array(
                'name' => 'Sản Xuất',
                'mo_ta' => 'Sản Xuất',
            ), array(
                'name' => 'Thiết Kế',
                'mo_ta' => 'Thiết Kế',
            ), array(
                'name' => 'Xây Dựng/Kiến Trúc',
                'mo_ta' => 'Xây Dựng/Kiến Trúc',
            ), array(
                'name' => 'Thương Mại/Xuất Nhập Khẩu',
                'mo_ta' => 'Thương Mại/Xuất Nhập Khẩu',
            ), array(
                'name' => 'Dự Án/Kế Hoạch',
                'mo_ta' => 'Dự Án/Kế Hoạch',
            ), array(
                'name' => 'Luật/Pháp Chế',
                'mo_ta' => 'Luật/Pháp Chế',
            ),
        ));
    }
}
