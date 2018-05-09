<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSanphamLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham_loai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham')->onDelete('cascade');
            $table->integer('loai_id')->unsigned();
            $table->foreign('loai_id')->references('id')->on('tbl_loai')->onDelete('cascade');
            $table->integer('so_luong');
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
        Schema::dropIfExists('tbl_sanpham_loai');
    }
}
