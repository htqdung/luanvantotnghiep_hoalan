<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\NguoiDung;
use App\SanPham;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
//        if( !\Session::has('user') )
//        {
//            return redirect()->back()->with('danger',' Mời bạn đăng nhập để thực hiện mua hàng ');
//        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * gio hang
     */
    public function index()
    {
        $products = \Cart::content();

        return view('trangchinh.giohang.index',compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * them  sp vao gio hang
     */
    public function add($id)
    {
        $products = \DB::table('tbl_sanpham')
            ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
            ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
            ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
            ->where('tbl_sanpham.id',$id)->first();

        if( ! $products)
        {
            return redirect()->back();
        }
        $km_sp = \DB::table('tbl_khuyenmai_sanpham')->where('sanpham_id',$products->id)->first();
        $price = $products->gia;
        $pt_sale = 0;
        if ($km_sp)
        {
            $sale = \DB::table('tbl_chuongtrinhkhuyenmai')->where('id',$km_sp->chuongtrinh_id)->first();
            if ($sale)
            {
                $pt_sale = $sale->ti_le_giam_gia;
                $price = (int)round($products->gia * ( 100 - $sale->ti_le_giam_gia  ) / 100,0, PHP_ROUND_HALF_UP) ;
            }
        }


        \Cart::add(['id' => $id, 'name' => $products->ten_san_pham, 'qty' => 1, 'price' => $price, 'options' => ['hinhanh' => $products->ten_hinh,'pt_sale' => $pt_sale]]);
        return redirect()->back()->with('success','Thêm giỏ hàng thành công');
    }

    public function updateCart(Request $request)
    {
        $data   = $request->except('_token');
        $qty    = array_get($data,'qty');
        $rowId  = array_get($data,'rowID');

        foreach($qty as $key => $item)
        {
            \Cart::update($rowId[$key],$item);
        }

        return redirect()->back()->with('success','Cập nhật thành công ');

    }

    public function delete($id)
    {
        \Cart::remove($id);
        return redirect()->back()->with('success',' Xoá sản phẩm trong giỏ hàng thành công');
    }

    public function pay()
    {
        if (!\Session::has('user'))
        {
            return redirect()->back()->with('danger',' Mời bạn đăng nhập hoạc đăng ký để thanh toán ');
        }

        $diachi     = \DB::table('tbl_diachi')->get();
        $phuongxa   = \DB::table('tbl_phuongxa')->get();
        $quanhuyen  = \DB::table('tbl_quanhuyen')->get();
        $tinhthanhp = \DB::table('tbl_tinh_thanhpho')->get();

        $hinhthucthanhtoan = \DB::table('tbl_hinh_thuc_thanh_toan')->get();

        $users = NguoiDung::find(\Session::get('user')->id);
        $viewData = [
            'diachi'            => $diachi,
            'tinhthanhp'        => $tinhthanhp,
            'phuongxa'          => $phuongxa,
            'quanhuyen'         => $quanhuyen,
            'users'             => $users,
            'hinhthucthanhtoan' => $hinhthucthanhtoan
        ];

        return view('trangchinh.dathang.pay',$viewData);
    }

    public function postPay(Request $request)
    {

        $id_donhang = \DB::table('tbl_donhang')->insertGetid([
           'ngay_dat_hang'         => date('Y-m-d'),
            'nguoidung_id'         => \Session::get('user')->id,
            'diachi_id'            => $request->address,
            'tong_tien'            => (str_replace(',','',\Cart::subtotal(0))),
            'ten_nguoi_nhan'       => $request->ten_nguoi_nhan,
            'hinhthucthanhtoan_id' => $request->hinh_thuc_thanh_toan,
            'created_at'           => Carbon::now(),
            'updated_at'           => Carbon::now()
        ]);

        if ($id_donhang)
        {
            foreach(\Cart::content() as $key => $val)
            {
                \DB::table('tbl_chitietdonhang')->insert([
                    'donhang_id' => $id_donhang,
                    'sanpham_id' => $val->id,
                    'don_gia'    => $val->price,
                    'so_luong'   => $val->qty,
                    'thanh_tien' => $val->price * $val->qty,
                    'created_at'   => Carbon::now(),
                    'updated_at'   => Carbon::now()
                ]);
                $sp = SanPham::find($val->id);
                $sp->so_luot_mua += 1;
                $sp->save();
            }
        }
        \Cart::destroy();
        return redirect('/')->with('success','Xác nhận thông tin thanh toán thành công ');
    }
}
