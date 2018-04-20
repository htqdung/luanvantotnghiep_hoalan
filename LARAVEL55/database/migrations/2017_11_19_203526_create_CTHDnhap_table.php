<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCTHDnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_CTHDnhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_luong');
            $table->string('don_gia');
            $table->timestamps();

            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');

            $table->integer('hoadonnhap_id')->unsigned();
            $table->foreign('hoadonnhap_id')->references('id')->on('tbl_hoadonnhap');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_CTHDnhap');
    }
}
