<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucUuDai extends Model
{
    protected $table = "tbl_hinhthucuudai";

     public function tbl_uudai()
    {
    	return $this->hasMany('App\UuDai','uudai_id','id');
    }

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
