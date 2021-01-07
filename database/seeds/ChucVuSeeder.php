<?php

use Illuminate\Database\Seeder;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuc_vu')->insert(array(
            array(
                'name' => 'Sinh viên/ Thực tập sinh'
            ), array(
                'name' => 'Mới tốt nghiệp'
            ), array(
                'name' => 'Nhân viên'
            ), array(
                'name' => 'Trưởng nhóm / Giám sát'
            ), array(
                'name' => 'Quản lý'
            ), array(
                'name' => 'Phó Giám đốc'
            ), array(
                'name' => 'Giám đốc'
            ), array(
                'name' => 'Tổng giám đốc'
            ), array(
                'name' => 'Chủ tịch / Phó Chủ tịch'
            ),
        ));
        //
    }
}
