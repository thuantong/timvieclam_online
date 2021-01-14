<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditCloumnsTinNhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tin_nhan', function (Blueprint $table) {
            $table->bigInteger('tai_khoan_id')->nullable()->unsigned();
            $table->bigInteger('to_tai_khoan_id')->nullable()->unsigned();
            $table->foreign('tai_khoan_id')->references('id')->on('tai_khoan')->onDelete('no action')->onUpdate('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tin_nhan', function (Blueprint $table) {
            //
        });
    }
}
