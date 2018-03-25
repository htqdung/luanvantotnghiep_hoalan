<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhThanhPho extends Model
{
    protected $table = "tbl_tinhthanhpho";

    public function tbl_quanhuyen()
    {
    	return $this->hasMany('App\QuanHuyen','tinhthanhpho_id','id');
    }
}
