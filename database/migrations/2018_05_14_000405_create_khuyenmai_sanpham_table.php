<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khuyenmai_sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham')->onDelete('cascade');
             $table->integer('chuongtrinhkhuyenmai_id')->unsigned();
            $table->foreign('chuongtrinhkhuyenmai_id')->references('id')->on('tbl_chuongtrinhkhuyenmai')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_khuyenmai_sanpham');
    }
}
