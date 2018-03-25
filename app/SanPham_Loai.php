<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham_Loai extends Model
{
    protected $table = "tbl_sanpham_loai";

     public function tbl_loai()
    {
    	return $this->belongsTo('App\Loai','loai_id','id');
    }

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
