<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_danhgia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diem');

            $table->integer('sanpham_id')->unsigned()->unique();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham');

            $table->integer('nguoidung_id')->unsigned()->unique();
            $table->foreign('nguoidung_id')->references('id')->on('tbl_nguoidung');

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
        Schema::dropIfExists('tbl_danhgia');
    }
}
