<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_binhluan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('binh_luan');
            $table->date('ngay_binh_luan');
            $table->timestamps();

            $table->integer('nguoidung_id')->unsigned();
            $table->foreign('nguoidung_id')->references('id')->on('tbl_nguoidung');

            $table->integer('nhanvien_id')->unsigned();
            $table->foreign('nhanvien_id')->references('id')->on('tbl_nhanvien');

            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_binhluan');
    }
}
