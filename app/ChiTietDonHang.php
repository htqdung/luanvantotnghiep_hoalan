<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = "tbl_chitietdonhang";

    public function tbl_giaohang()
    {
    	return $this->hasMany('App\GiaoHang','chitietdonhang_id','id');
    }

    public function tbl_thanhtoan()
    {
    	return $this->hasMany('App\ThanhToan','chitietdonhang_id','id');
    }

    public function tbl_donhang()
    {
    	return $this->belongsTo('App\DonHang','donhang_id','id');
    }

    public function tbl_sanpham()
    {
        return $this->belongsTo('App\SanPham','sanpham_id','id');
    }
}
