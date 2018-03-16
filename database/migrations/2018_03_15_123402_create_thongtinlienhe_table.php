<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongtinlienheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_thongtinlienhe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lienhe_id')->unsigned();
            $table->foreign('lienhe_id')->references('id')->on('tbl_lienhe')->onDelete('cascade');
            $table->string('ten', 100);
            $table->string('so_dien_thoai', 15);
            $table->string('email', 100);
            $table->integer('diachi_id')->unsigned();
            $table->foreign('diachi_id')->references('id')->on('tbl_diachi')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_thongtinlienhe');
    }
}
