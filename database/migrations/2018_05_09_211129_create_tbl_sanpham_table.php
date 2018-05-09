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
            $table->string('ten_san_pham', 200);
            $table->text('mo_ta')->nullable();
            $table->text('thong_tin_chi_tiet');
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
