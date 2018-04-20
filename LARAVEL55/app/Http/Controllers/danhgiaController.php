<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\danhgiaModel;
use Illuminate\Support\Facades\DB;
class danhgiaController extends Controller        public function DanhsachDanhgia()
    {
    	$danhsach = DB:table('tbl_danhgia')
    	->select('diem', 'sanpham_id', 'tbl_sanpham.ten_san_pham', 'nguoidung_id', 'tbl_nguoidung.ten_nguoi_dung' )
    	->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_danhgia.sanpham_id')
    	->join ('tbl_nguoidung', 'tbl_nguoidung.id','=', 'tbl_danhgia.nguoidung_id')
    	->get();
    }
{

}
