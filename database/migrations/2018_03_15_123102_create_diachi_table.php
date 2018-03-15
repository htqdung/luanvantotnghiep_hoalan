<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiachiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diachi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('so_nha', 20);
            $table->string('ten_duong', 100);
            $table->integer('phuongxa_id')->unsigned();
            $table->foreign('phuongxa_id')->references('id')->on('tbl_phuongxa')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_diachi');
    }
}
