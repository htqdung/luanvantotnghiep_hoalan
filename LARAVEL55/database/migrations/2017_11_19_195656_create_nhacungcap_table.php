<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhacungcap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_ncc');
            $table->string('dia_chi_ncc');
            $table->string('so_dien_thoai_ncc');
            $table->string('so_tai_khoan');
            $table->string('ten_ngan_hang');
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
        Schema::dropIfExists('tbl_nhacungcap');
    }
}
