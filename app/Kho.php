<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    protected $table = "tbl_kho";

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
