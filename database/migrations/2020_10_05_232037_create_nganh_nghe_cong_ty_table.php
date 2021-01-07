<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNganhNgheCongTyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nganh_nghe_cong_ty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nganh_nghe_id')->unsigned()->nullable();
            $table->bigInteger('cong_ty_id')->unsigned()->nullable();
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
        Schema::dropIfExists('nganh_nghe_cong_ty');
    }
}
