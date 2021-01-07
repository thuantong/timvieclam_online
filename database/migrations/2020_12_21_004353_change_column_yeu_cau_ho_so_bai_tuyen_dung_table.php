<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnYeuCauHoSoBaiTuyenDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_tuyen_dung', function (Blueprint $table) {
            $table->text('yeu_cau_ho_so')->nullable()->change();
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
