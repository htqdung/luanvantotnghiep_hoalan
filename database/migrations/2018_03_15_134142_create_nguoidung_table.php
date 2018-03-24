<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nguoidung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('password', 36)->nullable();
            $table->integer('nhom_id')->unsigned();
            $table->foreign('nhom_id')->references('id')->on('tbl_nhom')->onDelete('cascade');
            $table->integer('thongtinlienhe_id')->unsigned();
            $table->foreign('thongtinlienhe_id')->references('id')->on('tbl_thongtinlienhe')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('tbl_nguoidung');
    }
}
