<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKinhNghiemLamViecToDonXinViecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('don_xin_viec', function (Blueprint $table) {
            $table->text('kinh_nghiem_lam_viec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('don_xin_viec', function (Blueprint $table) {
            //
        });
    }
}
