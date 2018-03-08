<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khuyenmai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_khuyen_mai', 200);
            $table->integer('phan_tram_giam');
            $table->string('ma_giam_gia', 15);
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
        Schema::dropIfExists('tbl_khuyenmai');
    }
}
