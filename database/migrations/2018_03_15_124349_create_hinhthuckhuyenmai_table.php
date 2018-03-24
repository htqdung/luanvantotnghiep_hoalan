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
            $table->string('ti_le_giam_gia', 10);
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
