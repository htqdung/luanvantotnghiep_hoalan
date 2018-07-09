<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPhuongxaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phuongxa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_phuong_xa', 100);
            $table->integer('quanhuyen_id')->unsigned();
            $table->foreign('quanhuyen_id')->references('id')->on('tbl_quanhuyen')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_phuongxa');
    }
}
