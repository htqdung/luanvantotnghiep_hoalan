<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hoadonnhap', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngay_nhap_kho');
            $table->integer('chiet_khau');
            $table->date('ngay_giao_hang');
            $table->timestamps();

            $table->integer('nhanvien_id')->unsigned();
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');

            $table->integer('nhacungcap_id')->unsigned();
            $table->foreign('nhacungcap_id')->references('id')->on('tbl_nhacungcap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hoadonnhap');
    }
}
