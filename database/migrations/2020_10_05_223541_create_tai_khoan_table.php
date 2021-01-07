<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ho_ten')->nullable();
            $table->string('email')->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string('email_confirmed')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('email_verify_code')->nullable();
            $table->text('password');
            $table->string('phone', 12)->nullable();
            $table->smallInteger('status')->nullable()->default(1);

            $table->rememberToken();
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
        Schema::dropIfExists('tai_khoan');
    }
}
