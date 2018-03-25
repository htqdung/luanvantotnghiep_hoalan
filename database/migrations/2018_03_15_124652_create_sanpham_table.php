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
            $table->string('ten_san_pham', 200);
            $table->text('mo_ta', 1000)->nullable();
            $table->string('hinh_thuc', 1000);
            $table->string('kich_thuoc', 200);
            $table->integer('diem_thuong');
            $table->string('tag', 100)->nullable();
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
        Schema::dropIfExists('tbl_sanpham');
    }
}
