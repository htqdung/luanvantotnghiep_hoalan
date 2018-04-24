<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    protected $table = "tbl_loai";

    public function tbl_dacdiem()
    {
    	return $this->hasMany('App\DacDiem','dacdiem_id','id');
    }

    public function tbl_chi()
    {
    	return $this->belongsTo('App\Chi','chi_id','id');
    }

    public function tbl_sanpham_loai()
    {
    	return $this->hasMany('App\SanPham_Loai','loai_id','id');
    }

    public function sanpham()
    {
        return $this->belongsToMany(SanPham::class,'tbl_sanpham_loai','loai_id','sanpham_id');
    }
}
