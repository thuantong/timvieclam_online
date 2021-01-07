<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class   CreateSoDuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_du', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('tong_tien',12);
            $table->string('ten_tai_khoan')->nullable();
            $table->bigInteger('nguoi_tim_viec_id')->unsigned()->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('so_du');
    }
}
