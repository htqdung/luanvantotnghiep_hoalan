<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblDacdiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dacdiem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoa',255)->nullable();;
            $table->string('la',255)->nullable();;
            $table->string('than',255)->nullable();;
            $table->string('re',255)->nullable();;
            $table->string('thoigianno',255);
            $table->string('dac_diem_sinh_truong', 255);
           
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
        Schema::dropIfExists('tbl_dacdiem');
    }
}
