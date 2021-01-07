<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StoreCreateUpdateJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        DB::unprepared('
//            CREATE PROCEDURE create_job(IN txtTieuDe varchar(255), IN txtluong double, IN txtKhuVuc int, IN txtHanTuyen date, IN txtChucVu varchar(255), IN txtKieuLamViec tinyint, IN txtso_luong_tuyen int, IN txtnganh_nghe text, IN txtkinh_nghiem double, IN txtgioi_tinh int, IN txtbang_cap varchar(255), IN txtmo_ta text, IN txtquyen_loi text, IN txtyeu_cau_cong_viec text, IN txtyeu_cau_ho_so text, IN txtskill_basic text, IN txtstatus int, IN txtemployer_id bigint, IN txtisConfirm tinyint, IN txtisHot tinyint)
//            BEGIN
//            DECLARE txtgioi_tinh_text VARCHAR(255) DEFAULT "";
//            DECLARE txtstatus_text VARCHAR(255) DEFAULT "";
//            DECLARE txtisConfirm_text VARCHAR(255) DEFAULT "";
//            DECLARE txtisHot_text VARCHAR(255) DEFAULT "";
//            IF (txtgioi_tinh = 1) THEN
//                SET txtgioi_tinh_text = "Nam";
//            ELSEIF (txtgioi_tinh = 0) THEN
//                SET txtgioi_tinh_text = "Nữ";
//            ELSEIF (txtgioi_tinh = 1) THEN
//                SET txtgioi_tinh_text = "Tất cả";
//            END IF;
//
//            IF (txtstatus = 1) THEN
//                SET txtstatus_text = "Đang hoạt động";
//            ELSEIF (txtstatus = 0) THEN
//                SET txtstatus_text = "Tạm dừng";
//            ELSEIF (txtstatus = 2) THEN
//                SET txtstatus_text = "Chờ xác nhận";
//            END IF;
//
//            IF (txtisConfirm = 1) THEN
//                SET txtisConfirm_text = "Đã xác nhận";
//            ELSEIF (txtisConfirm = 0) THEN
//                SET txtisConfirm_text = "Chưa xác nhận";
//            END IF;
//
//            IF (txtisHot = 1) THEN
//                SET txtisHot_text = "Đang hoạt động";
//            ELSEIF (txtisHot = 0) THEN
//                SET txtisHot_text = "Tạm dừng";
//            END IF;
//
//                INSERT INTO jobs (tieu_de, luong, khu_vuc, han_tuyen, chuc_vu, kieu_lam_viec, so_luong_tuyen, nganh_nghe, kinh_nghiem, gioi_tinh, gioi_tinh_text, bang_cap, mo_ta, quyen_loi, yeu_cau_cong_viec, yeu_cau_ho_so, skill_basic, status, status_text, employer_id, isConfirm, isConfirm_text, isHot, isHot_text,created_at) VALUES
//                               (txtTieuDe, txtluong, txtKhuVuc, txtHanTuyen, txtChucVu, txtKieuLamViec, txtso_luong_tuyen, txtnganh_nghe, txtkinh_nghiem, txtgioi_tinh, txtgioi_tinh_text, txtbang_cap, txtmo_ta, txtquyen_loi, txtyeu_cau_cong_viec, txtyeu_cau_ho_so, txtskill_basic, txtstatus, txtstatus_text, txtemployer_id, txtisConfirm, txtisConfirm_text, txtisHot, txtisHot_text,CURRENT_TIMESTAMP());
//            END;'
//        );
//        DB::unprepared('
//            CREATE PROCEDURE update_job(IN txtJobsID bigint,IN txtTieuDe varchar(255), IN txtluong double, IN txtKhuVuc int, IN txtHanTuyen date, IN txtChucVu varchar(255), IN txtKieuLamViec tinyint, IN txtso_luong_tuyen int, IN txtnganh_nghe text, IN txtkinh_nghiem double, IN txtgioi_tinh int, IN txtbang_cap varchar(255), IN txtmo_ta text, IN txtquyen_loi text, IN txtyeu_cau_cong_viec text, IN txtyeu_cau_ho_so text, IN txtskill_basic text, IN txtstatus int, IN txtemployer_id bigint, IN txtisConfirm tinyint, IN txtisHot tinyint)
//            BEGIN
//            DECLARE txtgioi_tinh_text VARCHAR(255) DEFAULT "";
//            DECLARE txtstatus_text VARCHAR(255) DEFAULT "";
//            DECLARE txtisConfirm_text VARCHAR(255) DEFAULT "";
//            DECLARE txtisHot_text VARCHAR(255) DEFAULT "";
//            IF (txtgioi_tinh = 1) THEN
//                SET txtgioi_tinh_text = "Nam";
//            ELSEIF (txtgioi_tinh = 0) THEN
//                SET txtgioi_tinh_text = "Nữ";
//            ELSEIF (txtgioi_tinh = 1) THEN
//                SET txtgioi_tinh_text = "Tất cả";
//            END IF;
//
//            IF (txtstatus = 1) THEN
//                SET txtstatus_text = "Đang hoạt động";
//            ELSEIF (txtstatus = 0) THEN
//                SET txtstatus_text = "Tạm dừng";
//            ELSEIF (txtstatus = 2) THEN
//                SET txtstatus_text = "Chờ xác nhận";
//            END IF;
//
//            IF (txtisConfirm = 1) THEN
//                SET txtisConfirm_text = "Đã xác nhận";
//            ELSEIF (txtisConfirm = 0) THEN
//                SET txtisConfirm_text = "Chưa xác nhận";
//            END IF;
//
//            IF (txtisHot = 1) THEN
//                SET txtisHot_text = "Đang hoạt động";
//            ELSEIF (txtisHot = 0) THEN
//                SET txtisHot_text = "Tạm dừng";
//            END IF;
//                UPDATE jobs SET tieu_de = txtTieuDe, luong = txtluong, khu_vuc = txtKhuVuc, han_tuyen = txtHanTuyen, chuc_vu = txtChucVu, kieu_lam_viec = txtKieuLamViec, so_luong_tuyen = txtso_luong_tuyen, nganh_nghe = txtnganh_nghe, kinh_nghiem = txtkinh_nghiem, gioi_tinh = txtgioi_tinh, gioi_tinh_text = txtgioi_tinh_text, bang_cap = txtbang_cap, mo_ta = txtmo_ta, quyen_loi = txtquyen_loi, yeu_cau_cong_viec = txtyeu_cau_cong_viec, yeu_cau_ho_so = txtyeu_cau_ho_so, skill_basic = txtskill_basic, status = txtstatus, status_text = txtstatus_text, employer_id = txtemployer_id, isConfirm = txtisConfirm, isConfirm_text = txtisConfirm_text, isHot = txtisHot, isHot_text = txtisHot_text, updated_at = CURRENT_TIMESTAMP() WHERE jobs.id = txtJobsID;
//            END;'
//        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        DB::unprepared('DROP PROCEDURE IF EXISTS create_job');
    }
}
