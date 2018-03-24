<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = "tbl_donhang";

    public function tbl_trangthaidonhang()
    {
    	return $this->hasMany('App\TrangThaiDonHang','donhang_id','id');
    }

    public function tbl_diachi()
    {
    	return $this->belongsTo('App\DiaChi','diachi_id','id');
    }

    public function tbl_nguoidung()
    {
    	return $this->belongsTo('App\NguoiDung','nguoidung_id','id');
    }

    public function tbl_chitietdonhang()
    {
    	return $this->hasMany('App\ChiTietDonHang','donhang_id','id');
    }
}
