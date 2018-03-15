<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuatangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quatang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_qua_tang', 200);
            $table->string('so_luong', 10);
            $table->integer('hinhthuckhuyenmai_id')->unsigned();
            $table->foreign('hinhthuckhuyenmai_id')->references('id')->on('tbl_hinhthuckhuyenmai')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_quatang');
    }
}
