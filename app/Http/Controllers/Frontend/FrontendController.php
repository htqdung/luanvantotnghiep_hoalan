<?php

namespace App\Http\Controllers\Frontend;

use App\Loai;
use App\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * gioi thieu
     */
    public function about()
    {
        return view('trangchinh.gioithieu.gioithieu');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * lien he
     */
    public function contact()
    {
        return view('trangchinh.lienhe.lienhe');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * luu thong tin lien he
     */
    public function saveContact(Request $request)
    {
        if( !\Session::has('user') )
        {
            return redirect()->back()->with('danger','bạn phải đăng nhập mới thực hiện chức năng này');
        }
        $user = \Session::get('user');

        $data = $request->except('_token');
        $data['nguoidung_id'] = $user->id;
        $data['ngay_lien_he'] = Carbon::now();
        \DB::table('tbl_lienhe')->insert($data);
        // luu lai
        return redirect()->back()->with('success',' Lưu thông tin thành công ');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * san pham  khuyen mai
     */
    public function sale()
    {
        $products = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
            ->orderBy('tbl_sanpham.id','DESC')
            ->where('tbl_sanpham_loai.so_luong','>=',2)
            ->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia')
            ->distinct('tbl_sanpham_loai.sanpham_id')
            ->paginate(9);

        return view('trangchinh.khuyenmai.khuyenmai',compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * DANH SACH SAN PHAM
     */
    public function listproduct(Request $request)
    {

        $loai    = Loai::all();
        $loai_id = $request->loai;

        $products = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id');

        if ( $loai_id)
        {
            $products = $products->where('tbl_sanpham_loai.loai_id',$loai_id);
        }

        $products = $products->select('tbl_sanpham.*','tbl_dongia.gia','tbl_hinhanh.ten_hinh')->paginate(9);

        $viewData = [
            'products' => $products,
            'filter'   => $request->query(),
            'loai'     => $loai
        ];
        return view('trangchinh.sanpham.sanpham',$viewData);
    }

    public function detailProduct(Request $request)
    {
        $pattern = '/(?<=-)(\d+)(?>.html)$/i';

        preg_match($pattern, $request->segment(2), $match);
        if($match[1])
        {
            $id = $match[1];
            $product = \DB::table('tbl_sanpham')
                ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
                ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
                ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
                ->leftJoin('tbl_kho','tbl_sanpham.id','tbl_kho.sanpham_id')
                ->where('tbl_sanpham.id',$id)->first();

            if (!$product) return redirect('/');
            return view('trangchinh.chitietsanpham.chitietsanpham',compact('product','id'));
        }

        return redirect('/');
    }
}
