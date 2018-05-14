<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblChuongtrinhkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chuongtrinhkhuyenmai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_chuong_trinh', 255);
            $table->string('ten_hinh_anh', 255);
            $table->string('ti_le_giam_gia',200);
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
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
        Schema::dropIfExists('tbl_chuongtrinhkhuyenmai');
    }
}
