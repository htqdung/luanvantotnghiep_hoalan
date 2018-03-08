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
            $table->string('ten_nguoi_dung', 50);
            $table->string('so_dien_thoai', 25);
            $table->string('email', 36);
            $table->string('username', 50);
            $table->string('password', 36);
            $table->integer('nhom_id')->unsigned();
            $table->foreign('nhom_id')->references('id')->on('tbl_nhom');
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
