<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrangthaiDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trangthai_donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trangthai_id')->unsigned();
            $table->foreign('trangthai_id')->references('id')->on('tbl_trangthai')->onDelete('cascade');
            $table->integer('donhang_id')->unsigned();
            $table->foreign('donhang_id')->references('id')->on('tbl_donhang')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_trangthai_donhang');
    }
}
