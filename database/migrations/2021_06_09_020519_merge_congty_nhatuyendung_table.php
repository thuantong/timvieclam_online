<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MergeCongtyNhatuyendungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nha_tuyen_dung', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
         
            $table->string('websites')->nullable();
            $table->string('fax')->nullable();
            $table->string('phone',12)->nullable();
            $table->text('gio_lam_viec')->nullable();
            $table->text('ngay_lam_viec')->nullable();
            $table->integer('so_chi_nhanh')->nullable();
            $table->text('dia_chi_chi_nhanh')->nullable();
            $table->string('nam_thanh_lap',6)->nullable();
            $table->integer('dia_diem_id')->unsigned()->nullable();
            $table->integer('so_luong_nhan_vien_id')->unsigned()->nullable();
            $table->foreign('dia_diem_id')->references('id')->on('dia_diem')->onDelete('no action')->onUpdate('no action');
            $table->foreign('so_luong_nhan_vien_id')->references('id')->on('quy_mo_nhan_su')->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('nganh_nghe_nha_tuyen_dung', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nganh_nghe_id')->unsigned()->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('no action')->onUpdate('no action');
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('no action')->onUpdate('no action');
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
        Schema::dropIfExists('nha_tuyen_dung');
        Schema::dropIfExists('nganh_nghe_nha_tuyen_dung');
    }
}
