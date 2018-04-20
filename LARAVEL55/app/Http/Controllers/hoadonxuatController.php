<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\hoadonxuatModel;
use Illuminate\Support\Facades\DB;
class hoadonxuatController extends Controller
{
        public function DanhSachHoadonxuat()
    {
    	$danhsach = DB:table('tbl_hoadonxuat')
    	->select('id', 'dia_chi' , 'ngay_xuat_kho', 'trang_thai_nhap', 'chiet_khau', 'ngay_giao', 'dia_chi_giao',    'nhanvien_id', 'tbl_nhanvien.ten_nhanvien', 'nguoidung_id', 'tbl_nguoidung.ten_nguoi_dung')
    	->join('tbl_nhanvien', 'tbl_nhanvien.id', '=', 'tbl_hoadonxuat.nhanvien_id')
    	->join( 'tbl_nguoidung', 'tbl_nguoidung.id', '=', 'tbl_hoadonxuat.nguoidung_id')
    	->get();
    }
}
