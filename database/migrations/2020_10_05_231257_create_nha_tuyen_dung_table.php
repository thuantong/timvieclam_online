<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaTuyenDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_tuyen_dung', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->string('ho_ten')->nullable();
            $table->string('prefix')->nullable();
            $table->text('dia_chi')->nullable();
            $table->text('mang_xa_hoi')->nullable();
            $table->text('gioi_thieu')->nullable();
            $table->text('avatar')->nullable();
            $table->smallInteger('gioi_tinh')->nullable();
            $table->smallInteger('nam_sinh')->nullable();
            $table->smallInteger('status')->nullable();
            $table->bigInteger('tai_khoan_id')->unsigned()->nullable();
            $table->bigInteger('bai_dang_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nha_tuyen_dung');
    }
}
