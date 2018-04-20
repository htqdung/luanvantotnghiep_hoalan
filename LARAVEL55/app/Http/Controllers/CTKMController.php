<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\CTKMModel;
use Illuminate\Support\Facades\DB;
class CTKMController extends Controller
{
        public function DanhsachCTKM()
    {
    	$danhsach = DB:table('tbl_CTKM')
    	->select('id', 'phantram_chietkhau', 'sanpham_id', 'tbl_sanpham.ten_san_pham', 'khuyenmai_id', 'tbl_khuyenmai.ten_khuyen_mai' )
    	->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_CTKM.sanpham_id')
    	->join( 'tbl_khuyenmai', 'tbl_khuyenmai.id','=', 'tbl_CTKM.khuyenmai._id')
    	->get(); 
    }
}
