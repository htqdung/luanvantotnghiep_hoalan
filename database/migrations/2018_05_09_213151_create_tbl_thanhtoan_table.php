<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_thanhtoan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chitietdonhang_id')->unsigned();
            $table->foreign('chitietdonhang_id')->references('id')->on('tbl_chitietdonhang')->onDelete('cascade')->onDelete('cascade');
            $table->dateTimeTz('ngay_thanh_toan');
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
        Schema::dropIfExists('tbl_thanhtoan');
    }
}
