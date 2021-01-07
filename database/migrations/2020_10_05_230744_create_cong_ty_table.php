<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongTyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_ty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('websites')->nullable();
            $table->string('fax')->nullable();
            $table->string('phone',10)->nullable();
            $table->text('gio_lam_viec')->nullable();
            $table->text('ngay_lam_viec')->nullable();
            $table->integer('so_nhan_vien')->unsigned()->nullable();
            $table->integer('so_chi_nhanh')->nullable();
            $table->text('dia_chi_chi_nhanh')->nullable();
            $table->text('logo')->nullable();
            $table->text('gioi_thieu')->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('nam_thanh_lap',6)->nullable();
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
        Schema::dropIfExists('cong_ty');
    }
}
