<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinNhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_nhan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('noi_dung');
            $table->bigInteger('nguoi_tim_viec_id')->unsigned()->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
            $table->bigInteger('quan_tri_vien_id')->unsigned()->nullable();
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('tin_nhan');
    }
}
