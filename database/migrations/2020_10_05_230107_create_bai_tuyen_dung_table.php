<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiTuyenDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_tuyen_dung', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->unique();
            $table->string('tieu_de')->nullable();
            $table->string('luong');
            $table->string('tuoi');
            $table->string('ten_chuc_vu');
            $table->date('han_tuyen')->nullable();
            $table->dateTime('han_bai_viet')->nullable();
            $table->integer('so_luong_tuyen')->nullable();
            $table->integer('kinh_nghiem_id')->unsigned()->nullable();
            $table->smallInteger('gioi_tinh_tuyen')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('quyen_loi')->nullable();
            $table->text('yeu_cau_cong_viec')->nullable();
            $table->text('yeu_cau_ho_so')->nullable();
            $table->text('ky_nang_basic')->nullable();
            $table->text('dia_chi')->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('isHot')->nullable();
            $table->integer('chuc_vu_id')->unsigned()->nullable();
            $table->integer('kieu_lam_viec_id')->unsigned()->nullable();
            $table->integer('dia_diem_id')->unsigned()->nullable();
            $table->integer('bang_cap_id')->unsigned()->nullable();
            $table->bigInteger('nha_tuyen_dung_id')->unsigned()->nullable();
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
        Schema::dropIfExists('bai_tuyen_dung');
    }
}
