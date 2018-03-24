<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuongTrinhKhuyenMai extends Model
{
    protected $table = "tbl_chuongtrinhkhuyenmai";

    public function tbl_hinhthuckhuyenmai()
    {
    	return $this->belongsTo('App\HinhThucKhuyenMai','hinhthuckhuyenmai_id','id');
    }

    public function tbl_sanpham()
    {
    	return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
