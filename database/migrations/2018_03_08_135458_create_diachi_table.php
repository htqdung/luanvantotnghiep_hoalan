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
            $table->string('ten_nguoi_nhan', 40);
            $table->string('so_dien_thoai', 25);
            $table->string('dia_chi', 50);            
            $table->integer('phuongxa_id')->unsigned();
            $table->foreign('phuongxa_id')->references('id')->on('tbl_phuongxa');
                
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
