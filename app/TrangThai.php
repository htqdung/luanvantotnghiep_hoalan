<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    protected $table = "tbl_trangthai";

    public function tbl_trangthai_donhang()
    {
    	return $this->hasMany('App\TrangThai_DonHang','trangthai_id','id');
    }
}
