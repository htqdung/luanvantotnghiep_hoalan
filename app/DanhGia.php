<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = "tbl_danhgia";

    public function tbl_nguoidung()
    {
    	return $this->belongsTo('App\NguoiDung','nguoidung_id','id');
    }

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
