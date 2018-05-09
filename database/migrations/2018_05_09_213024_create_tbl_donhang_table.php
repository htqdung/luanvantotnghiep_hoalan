<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDonhangTable extends Migration
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
            $table->integer('diachi_id')->unsigned();
            $table->foreign('diachi_id')->references('id')->on('tbl_diachi')->onDelete('cascade');
            $table->integer('phi_van_chuyen');
            $table->integer('tong_tien');
            $table->string('ten_nguoi_nhan', 1000);
            $table->integer('hinhthucthanhtoan_id')->unsigned();
            $table->foreign('hinhthucthanhtoan_id')->references('id')->on('tbl_hinh_thuc_thanh_toan')->onDelete('cascade');
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
