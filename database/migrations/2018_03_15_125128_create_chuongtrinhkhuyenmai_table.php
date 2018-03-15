<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuongtrinhkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chuongtrinhkhuyenmai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham')->onDelete('cascade');
            $table->integer('hinhthuckhuyenmai_id')->unsigned();
            $table->foreign('hinhthuckhuyenmai_id')->references('id')->on('tbl_hinhthuckhuyenmai')->onDelete('cascade');
            $table->dateTimeTz('ngay_bat_dau');
            $table->dateTimeTz('ngay_ket_thuc');
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
        Schema::dropIfExists('tbl_chuongtrinhkhuyenmai');
    }
}
