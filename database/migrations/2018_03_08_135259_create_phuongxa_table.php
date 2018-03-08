<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuongxaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phuongxa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_phuong_xa', 40);
            $table->integer('quan_id')->unsigned();
            $table->foreign('quan_id')->references('id')->on('tbl_quanhuyen');
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
        Schema::dropIfExists('tbl_phuongxa');
    }
}
