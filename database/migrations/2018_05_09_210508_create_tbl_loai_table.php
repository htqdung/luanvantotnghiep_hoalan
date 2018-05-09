<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblLoaiTable extends Migration
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
            $table->string('ten_loai', 200)->unique();
            $table->string('ten_khoa_hoc', 200)->unique();
            $table->text('mo_ta')->nullable();
            $table->integer('chi_id')->unsigned();
            $table->foreign('chi_id')->references('id')->on('tbl_chi')->onDelete('cascade');
            $table->integer('dacdiem_id')->unsigned();
            $table->foreign('dacdiem_id')->references('id')->on('tbl_dacdiem')->onDelete('cascade');
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
