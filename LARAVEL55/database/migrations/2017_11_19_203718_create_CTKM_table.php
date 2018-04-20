<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCTKMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_CTKM', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phantram_chietkhau');
            $table->timestamps();

            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');

            $table->integer('khuyenmai_id')->unsigned();
            $table->foreign('khuyenmai_id')->references('id')->on('tbl_khuyenmai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_CTKM');
    }
}
