<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function getTest()
    {
    	return view('admin.index');
    	
    }
    public function getdanhmuchoa()
    {
    	return view('admin.modules.hoalan.danhmuchoa');
    }
    public function getdachsachsanpham()
    {
    	return view('admin.modules.hoalan.danhsachsanpham');
    }
    public function getdacdiemhoa()
    {
    	return view('admin.modules.dacdiemhoa.dacdiem');
    }
    public function getchi()
    {
    	return view('admin.modules.chi.chi');
    }
}
