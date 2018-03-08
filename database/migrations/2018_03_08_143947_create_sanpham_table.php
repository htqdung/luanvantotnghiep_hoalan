<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_san_pham', 50);
            $table->text('mo_ta');
            $table->integer('so_luong');
            $table->integer('gia');
            $table->integer('diem_thuong');
            $table->string('tag',255);
            $table->tinyInteger('trang_thai');
            $table->integer('loai_san_pham_id')->unsigned();
            $table->foreign('loai_san_pham_id')->references('id')->on('tbl_loaisanpham');
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
        Schema::dropIfExists('tbl_sanpham');
    }
}
