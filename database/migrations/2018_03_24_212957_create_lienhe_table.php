<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLienheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lienhe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de', 200);
            $table->text('noi_dung', 1000);
            $table->dateTimeTz('ngay_lien_he');
            $table->integer('nguoidung_id')->unsigned();
            $table->foreign('nguoidung_id')->references('id')->on('tbl_nguoidung')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_lienhe');
    }
}
