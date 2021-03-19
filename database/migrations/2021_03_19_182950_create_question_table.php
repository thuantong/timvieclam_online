<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->text("name")->nullable();
            $table->text("a")->nullable();
            $table->text("b")->nullable();
            $table->text("c")->nullable();
            $table->text("d")->nullable();
            $table->string("correct")->nullable();
            $table->text("name_trans")->nullable();
            $table->text("a_trans")->nullable();
            $table->text("b_trans")->nullable();
            $table->text("c_trans")->nullable();
            $table->text("d_trans")->nullable();
            $table->text("descipt")->nullable();
            $table->text("image")->nullable();
            $table->text("audio")->nullable();
            $table->bigInteger("topic_id")->unsigned()->nullable();
            $table->bigInteger("part_id")->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('question', function (Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topic')->onDelete('no action')->onUpdate('no action');
            $table->foreign('part_id')->references('id')->on('part')->onDelete('no action')->onUpdate('no action');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
