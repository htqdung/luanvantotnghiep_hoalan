<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSanphamTable extends Migration
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
            $table->string('ten_san_pham', 255);
            $table->text('mo_ta')->nullable();
            $table->text('kich_thuoc');
            $table->integer('diem_thuong');
            $table->string('tag', 255)->nullable();
            $table->string('so_luot_xem', 255)->nullable();
            $table->string('so_luot_mua', 255)->nullable();

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
