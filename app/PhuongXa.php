<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    protected $table = "tbl_phuongxa";

    public function tbl_diachi()
    {
    	return $this->hasMany('App\DiaChi','phuongxa_id','id');
    }

    public function tbl_quanhuyen()
    {
    	return $this->belongsTo('App\QuanHuyen','quanhuyen_id','id');
    }
}
