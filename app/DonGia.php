<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonGia extends Model
{
    protected $table = "tbl_dongia";

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
