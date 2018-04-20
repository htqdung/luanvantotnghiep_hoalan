<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\binhluanModel;
use Illuminate\Support\Facades\DB;
class binhluanController extends Controller
{
       public function DanhsachBinhluan()
    {
    	$danhsach = DB:table('tbl_binhluan')
    	->select('id', 'binh_luan', 'ngay_binh_luan','sanpham_id', 'tbl_sanpham.ten_san_pham', 'nhanvien_id', 'tbl_nhanvien.ten_nhanvien', 'nguoidung.id', 'tbl_nguoidung.ten_nguoi_dung' )
    	->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_binhluan.sanpham_id')
    	->join('tbl_nhanvien', 'tbl_nhanvien.id','=', 'tbl_binhluan.nhanvien_id')
    	->join('tbl_nguoidung', 'tbl_nguoidung.id', '=', 'tbl_binhluan.nguoidung_id')
    	->get(); 
    }
}
