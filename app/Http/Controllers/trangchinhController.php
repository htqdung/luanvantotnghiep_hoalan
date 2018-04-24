<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SanPham;
use App\DonGia;
use App\Loai;
use App\SanPham_Loai;
use App\HinhThucUuDai;
use App\UuDai;

class trangchinhController extends Controller
{
    public function trangchu()
    {
        //done
        return view('trangchinh.trangchu.trangchu');
    }

    public function gioithieu()
    {
        //done
        return view('trangchinh.gioithieu.gioithieu');
    }

    public function getsanpham()
    {
        $sanpham = SanPham::paginate(9);
        $dongia = DonGia::all();
        $loai = Loai::all();
        return view('trangchinh.sanpham.sanpham', compact('sanpham','dongia','loai'));
    }

    public function giohang()
    {
        return view('trangchinh.giohang.giohang');
    }

    public function khuyenmai()
    {
        //done
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
        //done
        return view('trangchinh.lienhe.lienhe');
    }
}
