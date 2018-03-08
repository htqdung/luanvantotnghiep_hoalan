<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDacdiemTable extends Migration
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
            $table->string('trang_thai',100);
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
