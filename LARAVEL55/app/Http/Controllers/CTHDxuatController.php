<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\CTHDxuatModel;
use Illuminate\Support\Facades\DB;
class CTHDxuatController extends Controller
{
        public function DanhsachCTHDxuat()
    {
    	$danhsach = DB:table('tbl_CTHDxuat')
    	->select('id', 'so_luong' , 'don_gia', 'sanpham_id', 'hoadonxuat_id')
    	->get();
    }
}
