<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table = "tbl_quanhuyen";

    public function tbl_phuongxa()
    {
    	return $this->hasMany('App\PhuongXa','phuongxa_id','id');
    }

    public function tbl_tinhthanhpho()
    {
    	return $this->belongsTo('App\TinhThanhPho','tinh_thanhpho_id','id');
    }
}
