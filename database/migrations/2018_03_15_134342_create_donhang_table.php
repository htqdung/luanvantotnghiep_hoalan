<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTimeTz('ngay_dat_hang');
            $table->integer('nguoidung_id')->unsigned();
            $table->foreign('nguoidung_id')->references('id')->on('tbl_nguoidung')->onDelete('cascade');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham')->onDelete('cascade');
            $table->integer('diachi_id')->unsigned();
            $table->foreign('diachi_id')->references('id')->on('tbl_diachi')->onDelete('cascade');
            $table->string('phi_van_chuyen', 10);
            $table->string('tong_tien', 20);
            $table->string('ten_nguoi_nhan', 1000);
            $table->string('hinh_thuc_thanh_toan', 200);
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
        Schema::dropIfExists('tbl_donhang');
    }
}
