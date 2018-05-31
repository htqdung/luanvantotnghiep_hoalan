<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ViewProducts;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\Jobs\Job;

class HomeController extends Controller
{
    public function index()
    {
//        dispatch(new \App\Jobs\TestLog);
//        event( new ViewProducts("XIn chao "));
        $productAll = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
            ->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia')
            ->distinct('tbl_sanpham_loai.sanpham_id')
            ->orderBy('tbl_sanpham.id','DESC')
            ->limit(10)->get();


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
            'productAll' => $productAll,
            'productSale' => $productSale
        ];
        return view('trangchinh.trangchu.index',$viewData);
    }


}
