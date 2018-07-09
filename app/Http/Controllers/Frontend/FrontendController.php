<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ViewProducts;
use App\Loai;
use App\SanPham;
use App\KhuyenMai_SanPham;
use App\ChuongTrinhKhuyenMai;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * xem don da dat
     */
    public function donhang()
    {
        return view('trangchinh.donhang.donhang');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * chi tiet don hang
     */
    public function chitietdonhang()
    {
        return view('trangchinh.donhang.chitietdonhang');
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

        $data = $request->except('_token','message');
        $data['nguoidung_id'] = $user->id;
        $data['ngay_lien_he'] = Carbon::now();
        $data['noi_dung']     = $request->message;
        \DB::table('tbl_lienhe')->insert($data);
        // luu lai
        return redirect()->back()->with('success',' Lưu thông tin thành công ');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * san pham qua tang
     */
    public function quatang(Request $request)
    {
        $products = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
            ->leftJoin('tbl_kho','tbl_sanpham.id','tbl_kho.sanpham_id');

        $gia = config('config_data');

        if ($request->price)
        {

            if (array_key_exists($request->price,$gia))
            {
                $products = $products->whereBetween('tbl_dongia.gia',$gia[$request->price]);
            }else {
                $products = $products->where('tbl_dongia.gia','<=',1000000);
            }
        }

        if ($request->loai)
        {
            $products = $products->where('tbl_sanpham_loai.loai_id',$request->loai) ;
        }

        if ($request->max_price && $request->min_price)
        {
            $products = $products->whereBetween('tbl_dongia.gia',[$request->min_price,$request->max_price]);
        }


        $products = $products->where('tbl_sanpham_loai.so_luong','>=',2)->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia')
            ->distinct('tbl_sanpham_loai.sanpham_id')
            ->paginate(12);


        $loai = Loai::all();
        $viewData = [
            'products' => $products,
            'loai'     => $loai,
            'query'    => $request->query()
        ];

        return view('trangchinh.quatang.index',$viewData);
    }

     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * san pham khuyen mai
     */
    public function  khuyenmai(Request $request)
    {
        $hinhthuckhuyenmai    = ChuongTrinhKhuyenMai::all();
        $chuongtrinhkhuyenmai = \DB::table('tbl_chuongtrinhkhuyenmai')->get();

        $products = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_khuyenmai_sanpham','tbl_sanpham.id','tbl_khuyenmai_sanpham.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id');
        $gia = config('config_data');

        if ($request->price)
        {

            if (array_key_exists($request->price,$gia))
            {
                $products = $products->whereBetween('tbl_dongia.gia',$gia[$request->price]);
            }else {
                $products = $products->where('tbl_dongia.gia','<=',1000000);
            }
        }

        if ($request->max_price && $request->min_price)
        {
            $products = $products->whereBetween('tbl_dongia.gia',[$request->min_price,$request->max_price]);
        }

        if ($request->loai)
        {
            $products = $products->where('tbl_sanpham_loai.loai_id',$request->loai) ;
        }


        if($request->chuong_trinh_khuyen_mai)
        {
            $products = $products->where('tbl_khuyenmai_sanpham.chuongtrinh_id',$request->chuong_trinh_khuyen_mai);
        }

        $products = $products->select('tbl_sanpham.*','tbl_dongia.gia','tbl_hinhanh.ten_hinh')->paginate(9);

        $viewData = [
            'products' => $products,
            'query'   => $request->query(),
            'hinhthuckhuyenmai' => $hinhthuckhuyenmai,
            'chuongtrinhkhuyenmai' => $chuongtrinhkhuyenmai
        ];


        return view('trangchinh.khuyenmai.khuyenmai',$viewData);
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



        if ($request->max_price && $request->min_price)
        {
            $products = $products->whereBetween('tbl_dongia.gia',[$request->min_price,$request->max_price]);
        }

        $products = $products->select('tbl_sanpham.*','tbl_dongia.gia','tbl_hinhanh.ten_hinh')->paginate(9);

        $viewData = [
            'products' => $products,
            'filter'   => $request->query(),
            'loai'     => $loai
        ];
        return view('trangchinh.sanpham.sanpham',$viewData);
    }

    // danh muc san pham
    public function loaiSp(Request $request)
    {


        $pattern = '/(?<=-)(\d+)(?>.html)$/i';
        preg_match($pattern, $request->segment(2), $match);

        $gia = config('config_data');
        if($match[1])
        {
            $hinhthuckhuyenmai    = ChuongTrinhKhuyenMai::all();

            $products = \DB::table('tbl_sanpham')
                ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
                ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
                ->leftJoin('tbl_khuyenmai_sanpham','tbl_sanpham.id','tbl_khuyenmai_sanpham.sanpham_id')
                ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
                ->leftJoin('tbl_kho','tbl_sanpham.id','tbl_kho.sanpham_id')
                ->where('tbl_sanpham_loai.loai_id',$match[1]) ;
            if ($request->price)
            {

                if (array_key_exists($request->price,$gia))
                {
                    $products = $products->whereBetween('tbl_dongia.gia',$gia[$request->price]);
                }else {
                    $products = $products->where('tbl_dongia.gia','<=',1000000);
                }
            }

            if ($request->quatang)
            {
                $products = $products->where('tbl_sanpham_loai.so_luong','>=',2);
            }

            if ($request->hinhthuckm)
            {
                $products = $products->where('tbl_khuyenmai_sanpham.chuongtrinh_id',$request->hinhthuckm);
            }

            if ($request->max_price && $request->min_price)
            {
                $products = $products->whereBetween('tbl_dongia.gia',[$request->min_price,$request->max_price]);
            }

            $products = $products ->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia')
                ->distinct('tbl_sanpham_loai.sanpham_id')
                ->paginate(12);


            $loai = Loai::find($match[1]);
            $viewData = [
                'products'  => $products,
                'loai'      => $loai,
                'khuyenmai' => $hinhthuckhuyenmai,
                'query'     => $request->query()
            ];
            return view('trangchinh.sanpham.sanpham',$viewData);
        }
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
                ->where('tbl_sanpham.id',$id)
                ->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia','tbl_sanpham_loai.loai_id')
                ->first();

            if (!$product) return redirect('/');

            $pro = SanPham::find($id);
            
            event( new ViewProducts($pro));

            $rag = \DB::table('tbl_danhgia')->where('sanpham_id',$id)->avg('danh_gia');
            $rag_count = \DB::table('tbl_danhgia')->where('sanpham_id',$id)->count();

            $product_suggess = \DB::table('tbl_sanpham')
                ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
                ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
                ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
                ->leftJoin('tbl_kho','tbl_sanpham.id','tbl_kho.sanpham_id')
                ->where('tbl_sanpham_loai.loai_id',$product->loai_id)
                ->select('tbl_sanpham.*','tbl_hinhanh.ten_hinh','tbl_dongia.gia')
                ->distinct('tbl_sanpham_loai.sanpham_id')
                ->get();

            return view('trangchinh.chitietsanpham.chitiet',compact('product','id','product_suggess','rag','rag_count'));
        }

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * lay quan / huyen thuoc city
     */
    public function getCity(Request $request)
    {
        $data = [
            'messages' => 'error'
        ];

        $id = $request->id;

        if ($id)
        {
            $district = \DB::table('tbl_quanhuyen')->where('tinh_thanhpho_id',$id)->get();
            $data = [
                'messages' => 'success',
                'district' => $district
            ];
            return response($data);
        }

        return response($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *  lay phuong xa theo quan huyen
     */
    public function getDistrict(Request $request)
    {
        $data = [
            'messages' => 'error'
        ];

        $id = $request->id;

        if ($id)
        {
            $wards = \DB::table('tbl_phuongxa')->where('quanhuyen_id',$id)->get();
            $data = [
                'messages' => 'success',
                'wards'    => $wards
            ];
            return response($data);
        }

        return response($data);
    }

    public function getWards(Request $request)
    {
        $data = [
            'messages' => 'error'
        ];

        $id = $request->id;
        \Log::info($id);
        if ($id)
        {
            $px = \DB::table('tbl_diachi')->where('phuongxa_id',$id)->get();

            $data = [
                'messages' => 'success',
                'px'    => $px
            ];
            return response($data);
        }

        return response($data);
    }

    public function searchTypehead(Request $request)
    {
        $products = SanPham::select('id','ten_san_pham');
        $query = $request->input('query');
        if($query)
        {
            $products = $products->where("ten_san_pham","LIKE","%{$query}%")->orderBy('id','DESC')->get();
        }else
        {
            $products = $products->orderBy('id','DESC')->get();
        }
        $products = $products->toArray();
        foreach($products as $key => $item)
        {
            $products[$key]['slug'] = str_slug($item['ten_san_pham']);
        }
        return response()->json($products);
    }


    public function showRegiter()
    {
        $address = \DB::table('tbl_diachi')->get();
        $group   = \DB::table('tbl_nhom')->get();
        $viewData = [
            'address' => $address,
            'group'   => $group
        ];
        return view('trangchinh.account.regiter',$viewData);
    }

    public function showLogin()
    {
        return view('trangchinh.account.login');

    }

    public function sendEmail(Request $request)
    {
        $email = $request->email ;

        try{
            \DB::table('tbl_email')->insert(array('email' => $email));
            $message = ' Chúng tôi sẽ sớm gủi thông tin vào email này cho bạn ';
        }catch (\Exception $e)
        {
            $message = ' Thất bại ! Email đã tồn tại ';
        }

        return redirect()->back()->with('success',$message);
    }
}
