<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\loaisanphamModel;
use Illuminate\Support\Facades\DB;
class loaisanphamController extends Controller
{
    public function DanhsachLoaisanpham()
    {
    	$danhsach = DB::table('tbl_loaisanpham')
    	->select('id', 'ten_loai' , 'ma_loai_cha')
    	->get();
    	return $danhsach;
    }

}
