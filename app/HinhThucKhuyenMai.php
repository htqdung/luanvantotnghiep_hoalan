<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucKhuyenMai extends Model
{
    protected $table = "tbl_hinhthuckhuyenmai";

    public function tbl_quatang()
    {
    	return $this->hasMany('App\QuaTang','hinhthuckhuyenmai_id','id');
    }

    public function tbl_chuongtrinhkhuyenmai()
    {
    	return $this->hasMany('App\ChuongTrinhKhuyenMai','hinhthuckhuyenmai_id','id');
    }
}
