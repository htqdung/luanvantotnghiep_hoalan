<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    protected $table = "tbl_diachi";

    public function tbl_thongtinlienhe()
    {
    	return $this->hasMany('App\ThongTinLienHe','diachi_id','id');
    }

    public function tbl_phuongxa()
    {
    	return $this->belongsTo('App\PhuongXa','phuongxa_id','id');
    }

    public function tbl_donhang()
    {
    	return $this->hasMany('App\DonHang','diachi_id','id');
    }
}
