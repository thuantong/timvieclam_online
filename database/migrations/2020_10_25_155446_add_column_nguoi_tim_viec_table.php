<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNguoiTimViecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nguoi_tim_viec', function (Blueprint $table) {
            $table->text('muc_tieu_nghe_nghiep')->nullable();
            $table->integer('bang_cap_id')->unsigned()->nullable();
            $table->integer('kieu_lam_viec_id')->unsigned()->nullable();
            $table->string('ten_truong_tot_nghiep')->nullable();
            $table->integer('dia_diem_id')->unsigned()->nullable();
            $table->string('tag_jobs')->nullable();

            $table->foreign('bang_cap_id')->references('id')->on('bang_cap')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kieu_lam_viec_id')->references('id')->on('kieu_lam_viec')->onDelete('no action')->onUpdate('no action');
            $table->foreign('dia_diem_id')->references('id')->on('dia_diem')->onDelete('cascade')->onUpdate('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('nguoi_tim_viec')->dropIfExists();
        //
    }
}
