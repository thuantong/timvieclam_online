<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatepasswordResetstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
//            $table->string('email')->index();
            // $table->integer('token')->change();
//            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('password_resets', function (Blueprint $table) {
//            $table->string('email')->index()->change();
//            $table->string('token')->change();
//            $table->timestamp('created_at')->nullable();
//
//        });
    }
}
