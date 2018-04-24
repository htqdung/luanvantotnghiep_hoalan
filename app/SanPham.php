<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "tbl_sanpham";

    public function tbl_danhgia()
    {
    	return $this->hasMany('App\DanhGia','sanpham_id','id');
    }

    public function tbl_sanpham_loai()
    {
    	return $this->hasMany('App\SanPham_Loai','sanpham_id','id');
    }

    public function tbl_hinhanh()
    {
    	return $this->hasMany('App\HinhAnh','sanpham_id','id');
    }

    public function tbl_hinhthucuudai()
    {
    	return $this->hasMany('App\HinhThucUuDai','sanpham_id','id');
    }

    public function tbl_chuongtrinhkhuyenmai()
    {
    	return $this->hasMany('App\ChuongTrinhKhuyenMai','sanpham_id','id');
    }

    public function tbl_chitietdonhang()
    {
        return $this->hasMany('App\ChiTietDonHang','sanpham_id','id');
    }

    public function tbl_dongia()
    {
        return $this->hasMany('App\DonGia','sanpham_id','id');
    }

    public function tbl_kho()
    {
        return $this->hasMany('App\Kho','sanpham_id','id');
    }

    public function loai()
    {
        return $this->belongsToMany('App\Loai','tbl_sanpham_loai','sanpham_id','loai_id');
    }
}
