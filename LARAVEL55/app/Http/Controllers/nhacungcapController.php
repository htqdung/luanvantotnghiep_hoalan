<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\nhacungcapModel;
use Illuminate\Support\Facades\DB;
class nhacungcapController extends Controller
{
    public function DanhsachNCC()
    {
    	$danhsach = DB:table('tbl_nhacungcap')
    	->select('id', 'ten_ncc' , 'dia_chi_ncc', 'so_dien_thoai_ncc', 'so_tai_khoan', 'ten_ngan_hang')
    	->get();
    }
}
