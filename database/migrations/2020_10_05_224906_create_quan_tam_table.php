<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanTamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan_tam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nguoi_tim_viec_id')->unsigned()->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
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
        Schema::dropIfExists('quan_tam');
    }
}
