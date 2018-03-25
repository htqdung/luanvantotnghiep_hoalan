<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = "tbl_hinhanh";

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
