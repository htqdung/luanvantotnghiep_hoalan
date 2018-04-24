<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhthuckhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hinhthuckhuyenmai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_hinh_thuc', 200);
            $table->integer('ti_le_giam_gia');
            $table->dateTimeTz('ngay_bat_dau');
            $table->dateTimeTz('ngay_ket_thuc');
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
        Schema::dropIfExists('tbl_hinhthuckhuyenmai');
    }
}
