<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoHang extends Model
{
    protected $table = "tbl_giaohang";

    public function tbl_chitietdonhang()
    {
    	return $this->belongsTo('App\ChiTietDonHang','chitietdonhang_id','id');
    }
}
