<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonXinViecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_xin_viec', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('file')->nullable();
            $table->bigInteger('bai_tuyen_dung_id')->unsigned()->nullable();
            $table->bigInteger('nguoi_tim_viec_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('don_xin_viec', function (Blueprint $table) {
            $table->foreign('bai_tuyen_dung_id')->references('id')->on('bai_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_xin_viec');
    }
}
