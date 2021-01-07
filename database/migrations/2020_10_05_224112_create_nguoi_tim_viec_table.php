<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiTimViecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_tim_viec', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->unique();
//            $table->string('ho_ten')->nullable();
            $table->string('viec_can_tim')->nullable();
            $table->text('gioi_thieu')->nullable();
            $table->text('dia_chi')->nullable();
            $table->smallInteger('gioi_tinh')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->text('ky_nang')->nullable();
            $table->text('exp_lam_viec')->nullable();
            $table->text('projects')->nullable();
            $table->text('vi_tri_tim')->nullable();
            $table->text('so_thich')->nullable();
            $table->text('avatar')->nullable();
            $table->smallInteger('status')->nullable();
            $table->integer('nganh_nghe_id')->nullable()->unsigned();
            $table->bigInteger('tai_khoan_id')->nullable()->unsigned();
            $table->string('muc_luong',10)->default(0);
            $table->text('social')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_tim_viec');
    }
}
