<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\khuyenmaiModel;
use Illuminate\Support\Facades\DB;
class khuyenmaiController extends Controller
{
        public function DanhsachKhuyenmai()
    {
    	$danhsach = DB:table('tbl_khuyenmai')
    	->select('id', 'ngay_bat_dau' , 'ngay_ket_thuc', 'ten_khuyen_mai', 'gioi_thieu')
    	->get();
    }
}
}
