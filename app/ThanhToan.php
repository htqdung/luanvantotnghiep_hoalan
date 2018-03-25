<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table = "tbl_thanhtoan";
    
    public function tbl_chitietdonhang()
    {
    	return $this->belongsTo('App\ChiTietDonHang','chitietdonhang_id','id');
    }
}
