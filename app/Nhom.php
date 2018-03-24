<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    protected $table = "tbl_nhom";

    public function tbl_nguoidung()
    {
    	return $this->hasMany('App\NguoiDung','nhom_id','id');
    }
}
