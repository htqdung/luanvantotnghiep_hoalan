<?php

namespace App\Http\Controllers\Frontend;

use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $product = SanPham::orderBy('id','DESC')->limit(8)->get();

        $productAll = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
            ->orderBy('tbl_sanpham.id','DESC')
            ->get();

        $productSale = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
            ->orderBy('tbl_sanpham.id','DESC')
            ->where('tbl_sanpham_loai.so_luong','>=',2)
            ->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia')
            ->distinct('tbl_sanpham_loai.sanpham_id')
            ->limit(8)->get();
        $viewData =
        [
            'product'    => $product,
            'productall' => $productAll,
            'productSale' => $productSale
        ];
        return view('trangchinh.trangchu.trangchu',$viewData);
    }


}
