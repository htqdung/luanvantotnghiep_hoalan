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
            $table->string('ten_san_pham');
            $table->integer('gia_ban');
            $table->text('mo_ta');
            $table->timestamps();

            $table->integer('loaisanpham_id')->unsigned();
            $table->foreign('loaisanpham_id')->references('id')->on('tbl_loaisanpham');
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
