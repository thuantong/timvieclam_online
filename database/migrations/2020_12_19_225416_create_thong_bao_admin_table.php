<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongBaoAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thong_bao', function (Blueprint $table) {
            $table->bigInteger('tai_khoan_from_id')->unsigned()->nullable();
            $table->bigInteger('tai_khoan_to_id')->unsigned()->nullable();
//            $table->name
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('thong_bao_admin');
    }
}
