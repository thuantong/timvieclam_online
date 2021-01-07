<?php

use Illuminate\Database\Seeder;

class LoaiTheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_the')->insert(array(
            array(
                'name'=>'10,000 đồng',
                'value'=>10.00,
            ),
            array(
                'name'=>'20,000 đồng',
                'value'=>20.00,
            ),
            array(
                'name'=>'50,000 đồng',
                'value'=>50.00,
            ),
            array(
                'name'=>'100,000 đồng',
                'value'=>100.00,
            ),
            array(
                'name'=>'200,000 đồng',
                'value'=>200.00,
            ),
            array(
                'name'=>'500,000 đồng',
                'value'=>500.00,
            ),
            array(
                'name'=>'1 triệu đồng',
                'value'=>1000.00,
            ),
        ));

        //
    }
}
