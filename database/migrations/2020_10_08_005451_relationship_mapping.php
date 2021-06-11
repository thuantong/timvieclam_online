<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationshipMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_tuyen_dung_nganh_nghe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bai_tuyen_dung_id')->nullable();
            $table->integer('nganh_nghe_id')->nullable();
        });
        //1
        Schema::table('tac_vu_phan_quyen', function (Blueprint $table) {
            $table->foreign('tac_vu_id')->references('id')->on('tac_vu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('phan_quyen_id')->references('id')->on('phan_quyen')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('phan_quyen_tai_khoan', function (Blueprint $table) {
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('phan_quyen_id')->references('id')->on('phan_quyen')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('nguoi_tim_viec', function (Blueprint $table) {
            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('no action')->onUpdate('no action');
        });

        // Schema::table('so_du', function (Blueprint $table) {
        //     $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
        // });

        Schema::table('quan_tam', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('nha_tuyen_dung', function (Blueprint $table) {
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('no action')->onUpdate('no action');
        });

        Schema::table('tin_nhan', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('quan_tri_vien_id')->references('id')->on('quan_tri_vien')->onDelete('SET NULL')->onUpdate('cascade');
        });

        Schema::table('cong_ty', function (Blueprint $table) {
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('nganh_nghe_cong_ty', function (Blueprint $table) {
            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cong_ty_id')->references('id')->on('cong_ty')->onDelete('no action')->onUpdate('no action');
        });

        Schema::table('quan_tri_vien', function (Blueprint $table) {
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('no action')->onUpdate('no action');
        });

        Schema::table('duyet_bai', function (Blueprint $table) {
            $table->foreign('bai_dang_id')->references('id')->on('bai_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('quan_tri_vien_id')->references('id')->on('quan_tri_vien')->onDelete('SET NULL')->onUpdate('cascade');
        });

        Schema::table('bai_tuyen_dung', function (Blueprint $table) {
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vu')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('kieu_lam_viec_id')->references('id')->on('kieu_lam_viec')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('cong_ty_id')->references('id')->on('cong_ty')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('dia_diem_id')->references('id')->on('dia_diem')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('bang_cap_id')->references('id')->on('bang_cap')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });

        Schema::table('bai_tuyen_dung_nganh_nghe', function (Blueprint $table) {
            $table->integer('nganh_nghe_id')->unsigned()->nullable()->change();
            $table->bigInteger('bai_tuyen_dung_id')->unsigned()->nullable()->change();
            $table->foreign('nganh_nghe_id')->references('id')->on('nganh_nghe')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('bai_tuyen_dung_id')->references('id')->on('bai_tuyen_dung')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('don_hang', function (Blueprint $table) {
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('bai_tuyen_dung_id')->references('id')->on('bai_tuyen_dung')->onDelete('SET NULL')->onUpdate('NO ACTION');
            $table->foreign('hang_muc_thanh_toan_id')->references('id')->on('hang_muc_thanh_toan')->onDelete('SET NULL')->onUpdate('cascade');
        });

        Schema::table('thich', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('bai_tuyen_dung_id')->references('id')->on('bai_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
        });

        Schema::table('luu_bai', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('bai_tuyen_dung_id')->references('id')->on('bai_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
        });

        Schema::table('bao_cao', function (Blueprint $table) {
            $table->foreign('nguoi_tim_viec_id')->references('id')->on('nguoi_tim_viec')->onDelete('SET NULL')->onUpdate('cascade');
            $table->foreign('nha_tuyen_dung_id')->references('id')->on('nha_tuyen_dung')->onDelete('SET NULL')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
