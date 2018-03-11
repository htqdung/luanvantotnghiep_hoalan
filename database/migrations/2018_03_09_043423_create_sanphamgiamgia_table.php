<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamgiamgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanphamgiamgia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_luong_sp');
            $table->integer('san_pham_id')->unsigned();
            $table->foreign('san_pham_id')->references('id')->on('tbl_sanpham');
            $table->integer('giam_gia_id')->unsigned();
            $table->foreign('giam_gia_id')->references('id')->on('tbl_giamgia');
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
        Schema::dropIfExists('tbl_sanphamgiamgia');
    }
}
