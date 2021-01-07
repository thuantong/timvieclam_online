<?php

use Illuminate\Database\Seeder;

class HangMucThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hang_muc_thanh_toan')->insert(array(
            array(
                'name'=>'Đăng Bài Viết',
                'gia'=> 1
            ),
            array(
                'name'=>'Đăng ký bài hot',
                'gia'=> 1
            )
        ));


        //
    }
}
