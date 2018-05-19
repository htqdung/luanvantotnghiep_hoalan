<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblChiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_chi', 255)->unique();
            $table->string('ten_khoa_hoc_chi', 255);
            $table->string('chi_re', 255);
            $table->string('chi_than', 255);
            $table->string('chi_la', 255);
            $table->string('chi_canh', 255);
            $table->string('chi_hoa', 255);
            $table->text('mo_ta')->nullable();
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
        Schema::dropIfExists('tbl_chi');
    }
}
