<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('so_luong');
            $table->decimal('tong_tien',12)->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
            $table->bigInteger('nguoi_tim_viec_id')->unsigned()->nullable();
            $table->bigInteger('bai_tuyen_dung_id')->unsigned()->nullable();
            $table->integer('hang_muc_thanh_toan_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
