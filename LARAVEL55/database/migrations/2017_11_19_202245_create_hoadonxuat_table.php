<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hoadonxuat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia_chi');
            $table->date('ngay_xuat_kho');
            $table->string('trang_thai_nhap');
            $table->integer('chiet_khau');
            $table->date('ngay_giao');
            $table->string('dia_chi_giao');
            $table->timestamps();

            $table->integer('nhanvien_id')->unsigned();
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');
            $table->integer('nguoidung_id')->unsigned();
            $table->foreign('nguoidung_id')->references('id')->on('tbl_nguoidung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hoadonxuat');
    }
}
