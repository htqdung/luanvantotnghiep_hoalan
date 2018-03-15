<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chitietdonhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->foreign('donhang_id')->references('id')->on('tbl_donhang')->onDelete('cascade');
            $table->string('so_luong', 10);
            $table->string('thanh_tien', 20);
            $table->integer('dongia_id')->unsigned();
            $table->foreign('dongia_id')->references('id')->on('tbl_dongia')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_chitietdonhang');
    }
}
