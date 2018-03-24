<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    protected $table = "tbl_lienhe";

    public function tbl_nguoidung()
    {
    	return $this->belongsTo('App\NguoiDung','nguoidung_id','id');
    }
}
