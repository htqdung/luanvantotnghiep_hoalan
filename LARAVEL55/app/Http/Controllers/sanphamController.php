<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\sanphamModel;
use Illuminate\Support\Facades\DB;
class sanphamController extends Controller
{
    public function DanhSachMyPham()
    {
    	// $danhsach = DB:table('tbl_sanpham')
    	// ->select('id', 'ten_san_pham' , 'gia_ban', 'mo_ta', 'loaisanpham_id', 'tbl_loaisanpham.ten_loai')
    	// ->join('tbl_loaisanpham', 'tbl_loaisanpham.id', '=', 'tbl_sanpham.loaisanpham_id')
    	// ->get();
    	// return $danhsach;
    	echo "day la trang danh sách";
    }
}
