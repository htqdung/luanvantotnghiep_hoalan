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
            $table->string('ten', 30);
            $table->string('so_dien_thoai', 25);
            $table->string('email', 50);
            $table->string('tieu_de', 50);
            $table->text('noidung');
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
