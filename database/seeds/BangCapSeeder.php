<?php

use Illuminate\Database\Seeder;

class BangCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bang_cap')->insert(array(
            array(
                'name'=>'Không yêu cầu bằng cấp'
            ),array(
                'name'=>'Trung học'
            ),array(
                'name'=>'Trung cấp'
            ),array(
                'name'=>'Cao đẳng'
            ),array(
                'name'=>'Đại học'
            ),array(
                'name'=>'Sau đại học'
            ),array(
                'name'=>'Khác'
            ),
        ));
        //
    }
}
