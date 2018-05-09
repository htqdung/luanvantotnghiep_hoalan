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
            $table->string('hoa',100);
            $table->string('la',100);
            $table->string('than',100);
            $table->string('re',100);
            $table->string('thoigianno',100);
            $table->string('dac_diem_sinh_truong', 200);
            $table->string('hinh_dang', 200);
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
