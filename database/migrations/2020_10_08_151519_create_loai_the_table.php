<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiTheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_the', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('value',12,2)->nullable();
//            $table->timestamps();
        });
        Schema::table('nap_the', function (Blueprint $table) {
            $table->foreign('loai_the_id')->references('id')->on('loai_the')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_the');
    }
}
