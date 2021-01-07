<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKinhNghiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinh_nghiem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mo_ta')->nullable();
        });
        Schema::table('bai_tuyen_dung', function (Blueprint $table) {
            $table->foreign('kinh_nghiem_id')->references('id')->on('kinh_nghiem')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kinh_nghiem');
    }
}
