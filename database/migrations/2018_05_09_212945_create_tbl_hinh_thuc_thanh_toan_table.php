<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHinhThucThanhToanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hinh_thuc_thanh_toan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_hinh_thuc');
            $table->tinyInteger('trang_thai');
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
        Schema::dropIfExists('tbl_hinh_thuc_thanh_toan');
    }
}
