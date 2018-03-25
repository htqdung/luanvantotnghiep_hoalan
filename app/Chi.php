<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chi extends Model
{
    protected $table = "tbl_chi";

    public function tbl_loai()
    {
    	return $this->hasMany('App\Loai','chi_id','id');
    }
}
