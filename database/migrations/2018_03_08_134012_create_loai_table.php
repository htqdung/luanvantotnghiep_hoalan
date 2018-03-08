<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_loai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_loai', 200);
            $table->string('ten_khoa_hoc', 200);
            $table->string('mo_ta', 200);
            $table->tinyInteger('trangthai');

            $table->integer('chi_id')->unsigned();
            $table->foreign('chi_id')->references('id')->on('tbl_chi');
            $table->integer('dacdiem_id')->unsigned();
            $table->foreign('dacdiem_id')->references('id')->on('tbl_dacdiem');
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
        Schema::dropIfExists('tbl_loai');
    }
}
