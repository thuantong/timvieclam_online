<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacVuPhanQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tac_vu_phan_quyen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tac_vu_id')->unsigned()->nullable();
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
        Schema::dropIfExists('tac_vu_phan_quyen');
    }
}
