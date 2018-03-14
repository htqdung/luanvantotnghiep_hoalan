<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class trangchinhController extends Controller
{
    public function trangchu()
    {
        return view('trangchinh.trangchu.trangchu');
    }

    public function gioithieu()
    {
        return view('trangchinh.gioithieu.gioithieu');
    }

    public function sanpham()
    {
        return view('trangchinh.sanpham.sanpham');
    }

    public function giohang()
    {
        return view('trangchinh.giohang.giohang');
    }

    public function khuyenmai()
    {
        return view('trangchinh.khuyenmai.khuyenmai');
    }

    public function chitietsanpham()
    {
        return view('trangchinh.chitietsanpham.chitietsanpham');
    }

    public function dathang1()
    {
        return view('trangchinh.dathang.dathang1');
    }


    public function dathang2()
    {
        return view('trangchinh.dathang.dathang2');
    }

    public function dathang3()
    {
        return view('trangchinh.dathang.dathang3');
    }

    public function dathang4()
    {
        return view('trangchinh.dathang.dathang4');
    }

    public function lienhe()
    {
        return view('trangchinh.lienhe.lienhe');
    }
}
