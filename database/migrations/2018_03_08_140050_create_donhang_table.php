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
            $table->date('ngay_dat_hang');
            $table->integer('phi_van_chuyen');
            $table->integer('tong_tien');
            $table->tinyInteger('hinh_thuc_thanh_toan');
            $table->integer('nguoidung_id')->unsigned();
            $table->foreign('nguoidung_id')->references('id')->on('tbl_nguoidung');
            $table->integer('diachi_id')->unsigned();
            $table->foreign('diachi_id')->references('id')->on('tbl_diachi');
            $table->integer('khuyenmai_id')->unsigned();
            $table->foreign('khuyenmai_id')->references('id')->on('tbl_khuyenmai');
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
