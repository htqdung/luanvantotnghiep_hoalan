<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh_ThanhPho extends Model
{
    protected $table = "tbl_tinh_thanhpho";

    public function tbl_quanhuyen()
    {
    	return $this->hasMany('App\QuanHuyen','tinh_thanhpho_id','id');
    }
}
