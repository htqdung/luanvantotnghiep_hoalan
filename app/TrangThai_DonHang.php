<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThai_DonHang extends Model
{
    protected $table = "tbl_trangthai_donhang";

    public function tbl_trangthai()
    {
    	return $this->belongsTo('App\TrangThai','trangthai_id','id');
    }

    public function tbl_donhang()
    {
    	return $this->belongsTo('App\DonHang','donhang_id','id');
    }
}
