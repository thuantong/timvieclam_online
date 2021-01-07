<?php

use Illuminate\Database\Seeder;

class KieuLamViecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kieu_lam_viec')->insert(array(
            array(
                'name' => 'Nhân viên chính thức'
            ), array(
                'name' => 'Bán thời gian'
            ), array(
                'name' => 'Thời vụ - Nghề tự do'
            ), array(
                'name' => 'Thực tập'
            ),
        ));
        //
    }
}
