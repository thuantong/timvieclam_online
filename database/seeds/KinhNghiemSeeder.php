<?php

use Illuminate\Database\Seeder;

class KinhNghiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kinh_nghiem')->insert(array(
            array(
                'name' => 'Không cần kinh nghiệm'
            ),
            array(
                'name' => 'Dưới 1 năm'
            ),
            array(
                'name' => '1 đến 2 năm'
            ),
            array(
                'name' => '2 đến 3 năm'
            ),
            array(
                'name' => 'Trên 3 năm'
            ),
        ));
        //
    }
}
