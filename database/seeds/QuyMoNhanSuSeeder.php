<?php

use Illuminate\Database\Seeder;

class QuyMoNhanSuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quy_mo_nhan_su')->insert(array(
            array(
                'name'=> 'Dưới 20 người',
            ),
            array(
                'name'=>'Từ 20 đến 50 người'
            ),
            array(
                'name'=>'Từ 50 đến 75 người'
            ),
            array(
                'name'=>'Từ 75 đến 100 người'
            ),
            array(
                'name'=>'Từ 100 đến 200 người'
            ),
            array(
                'name'=> 'Trên 200 người'
            )
        ));

        //
    }
}
