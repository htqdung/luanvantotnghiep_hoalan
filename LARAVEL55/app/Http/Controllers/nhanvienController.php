<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\nhanvienModel;
use Illuminate\Support\Facades\DB;
class nhanvienController extends Controller
{
    public function DanhsachNhanvien()
    {
    	$danhsach = DB:table('tbl_nhanvien')
    	->select('id', 'ten_nhanvien' , 'dia_chi', 'so_dien_thoai')
    	->get();
    }
}
