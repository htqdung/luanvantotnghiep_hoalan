<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamloaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanphamloai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('so_luong');
            $table->integer('san_pham_id')->unsigned();
            $table->foreign('san_pham_id')->references('id')->on('tbl_sanpham');
            $table->integer('loai_id')->unsigned();
            $table->foreign('loai_id')->references('id')->on('tbl_loai');
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
        Schema::dropIfExists('tbl_sanphamloai');
    }
}
