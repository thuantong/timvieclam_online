<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoCaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('mo_ta')->nullable();
            $table->text('picture')->nullable();
            $table->bigInteger('nguoi_tim_viec_id')->nullable()->unsigned();
            $table->bigInteger('nha_tuyen_dung_id')->nullable()->unsigned();
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
        Schema::dropIfExists('bao_cao');
    }
}
