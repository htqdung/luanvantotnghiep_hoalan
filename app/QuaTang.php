<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuaTang extends Model
{
    protected $table = "tbl_quatang";

    public function tbl_hinhthuckhuyenmai()
    {
    	return $this->belongsTo('App\HinhThucKhuyenMai','hinhthuckhuyenmai_id','id');
    }
}
