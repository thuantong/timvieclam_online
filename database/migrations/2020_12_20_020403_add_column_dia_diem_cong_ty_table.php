<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDiaDiemCongTyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cong_ty', function (Blueprint $table) {
            $table->integer('dia_diem_id')->unsigned()->nullable();
            $table->foreign('dia_diem_id')->references('id')->on('dia_diem')->onDelete('NO ACTION')->onUpdate('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cong_ty', function (Blueprint $table) {
            //
        });
    }
}
