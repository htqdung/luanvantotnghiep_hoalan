<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\hoadonnhapModel;
use Illuminate\Support\Facades\DB;
class hoadonnhapController extends Controller
{
        public function DanhSachHoadonnhap()
    {
    	$danhsach = DB:table('tbl_hoadonnhap')
    	->select('id' , 'ngay_nhap_kho', 'chiet_khau', 'ngay_giao_hang','nhanvien_id', 'tbl_nhanvien.ten_nhanvien', 'nhacungcap_id', 'tbl_nhacungcap.ten_ncc')
    	->join('tbl_nhanvien', 'tbl_nhanvien.id', '=', 'tbl_hoadonxuat.nhanvien_id')
    	->join( 'tbl_nhacungcap', 'tbl_nhacungcap.id', '=', 'tbl_hoadonxuat.nhacungcap_id')
    	->get();
    }
}
