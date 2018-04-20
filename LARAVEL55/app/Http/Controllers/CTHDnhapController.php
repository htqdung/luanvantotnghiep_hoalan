<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\CTHDnhapModel;
use Illuminate\Support\Facades\DB;
class CTHDnhapController extends Controller
{
        public function DanhsachCTHDnhap()
    {
    	$danhsach = DB:table('tbl_CTHDnhap')
    	->select('id', 'so_luong' , 'don_gia', 'sanpham_id', 'hoadonnhap_id')
    	->get();
    }
}
