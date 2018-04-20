<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCTHDxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_CTHDxuat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_luong');
            $table->string('don_gia');
            $table->timestamps();

            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');

            $table->integer('hoadonxuat_id')->unsigned();
            $table->foreign('hoadonxuat_id')->references('id')->on('tbl_hoadonxuat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_CTHDxuat');
    }
}
