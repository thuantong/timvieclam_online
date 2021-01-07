<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnBaiTuyenDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_tuyen_dung', function (Blueprint $table) {
            $table->integer('luong_from')->nullable();
            $table->integer('luong_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bai_tuyen_dung', function (Blueprint $table) {
            //
        });
    }
}
