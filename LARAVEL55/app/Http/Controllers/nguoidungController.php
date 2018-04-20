<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\nguoidungModel;
use Illuminate\Support\Facades\DB;
class nguoidungController extends Controller
{
        public function DanhsachNguoidung()
    {
    	$danhsach = DB:table('tbl_nguoidung')
    	->select('id', 'FB_ID' , 'ten_nguoi_dung', 'dia_chi', 'so_dien_thoai')
    	->get();
    }
}
