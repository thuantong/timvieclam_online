<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanQuyenTaiKhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_quyen_tai_khoan', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('tai_khoan_id')->unsigned()->nullable();
            $table->integer('phan_quyen_id')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_quyen_tai_khoan');
    }
}
