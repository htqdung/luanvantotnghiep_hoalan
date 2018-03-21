<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrangthaiHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trangthai_hoadon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trangthai_id')->unsigned();
            $table->foreign('trangthai_id')->references('id')->on('tbl_trangthai');
            $table->integer('donhang_id')->unsigned();
            $table->foreign('donhang_id')->references('id')->on('tbl_donhang');
            
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
        Schema::dropIfExists('tbl_trangthai_hoadon');
    }
}
