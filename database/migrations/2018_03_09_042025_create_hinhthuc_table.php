<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhthucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hinhthuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_hinh_thuc', 200);
            $table->integer('san_pham_id')->unsigned();
            $table->foreign('san_pham_id')->references('id')->on('tbl_sanpham');
            $table->integer('uu_dai_id')->unsigned();
            $table->foreign('uu_dai_id')->references('id')->on('tbl_uudai');
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
        Schema::dropIfExists('tbl_hinhthuc');
    }
}
