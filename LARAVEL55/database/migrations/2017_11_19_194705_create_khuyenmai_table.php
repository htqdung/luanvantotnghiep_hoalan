<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khuyenmai', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket-thuc');
            $table->string('ten_khuyen_mai');
            $table->text('gioi_thieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the mig$table->date('created_at');rations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_khuyenmai');
    }
}
