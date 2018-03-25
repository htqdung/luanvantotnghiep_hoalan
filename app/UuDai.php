<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UuDai extends Model
{
    protected $table = "tbl_uudai";

    public function tbl_hinhthucuudai()
    {
    	return $this->belongsTo('App\HinhThucUuDai','uudai_id','id');
    }
}
