<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinLienHe extends Model
{
    protected $table = "tbl_thongtinlienhe";

    public function tbl_nguoidung()
    {
    	return $this->hasMany('App\NguoiDung','nguoidung_id','id');
    }

    public function tbl_diachi()
    {
    	return $this->belongsTo('App\DiaChi','diachi_id','id');
    }
}
