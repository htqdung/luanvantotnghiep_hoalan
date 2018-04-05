<?php

namespace App\Http\Controllers;
use App\Loai;
use Illuminate\Http\Request;
use DB;
class adminController extends Controller
{
    public function getTest()
    {
    	return view('admin.trangchu.index');
    	
    }
    public function getdanhmuchoa()
    {
        $hoalan = DB::table('tbl_loai')->get();
    	return view('admin.modules.hoalan.danhmuchoa', ['data'=>$hoalan]);
    }

    public function getChinhSuaHoa($id)
    {
        $hoalan = Loai::findOrFail($id);
        // echo $hoalan;
        return view('admin.modules.hoalan.danhmuchoa_chinhsua', ['data'=>$hoalan]);
    }

    public function getdachsachsanpham()
    {
    	return view('admin.modules.hoalan.danhsachsanpham');
    }
//đặc điểm
    public function getdacdiemhoa()
    {
    	return view('admin.modules.dacdiemhoa.dacdiem');
    }
    public function chinhsuadacdiem($id)
    {
        $dacdiem = DB::table('tbl_dacdiem')
        ->select('id','hoa','la','than','re')
        ->orderBy('id','desc')
        ->paginate(10);
        return view('admin.modules.dacdiemhoa.chinhsuadacdiem', ['data'=>$dacdiem]);
    }
    public function themdacdiem()
    {
        return view('admin.modules.dacdiemhoa.themdacdiem');
    }




//chi
    public function getchi()
    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi', 'mo_ta')
        ->orderBy('id', 'desc')
        ->paginate(10);

    	return view('admin.modules.chi.chi', ['data'=>$chi]);
    }
    public function themchi()
    {
       return view('admin.modules.chi.themchi');
    }
    public function chinhsuachi()
    {
        return view('admin.modules.chi.chinhsuachi');
    }



//người dùng

    public function getnguoidung()
    {
        $nguoidung = DB::table('tbl_nguoidung')
        ->join('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->join('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->join('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->join('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->join('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_thongtinlienhe.ten','so_nha', 'ten_duong','so_dien_thoai', 'email', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho')
        ->get();
        // return $nguoidung;
        return view('admin.modules.nguoidung.danhsachnguoidung' , ['data'=>$nguoidung]);
    }
    public function themnguoidung()
    {
        return view('admin.modules.nguoidung.themnguoidung');
    }
    public function chinhsuanguoidung()
    {
        return view('admin.modules.nguoidung.chinhsuanguoidung');
    }






//khuyến mãi

    public function getdanhsachkhuyenmai()
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id','ngay_bat_dau','ngay_ket_thuc','ti_le_giam_gia','tbl_hinhthuckhuyenmai.ten_hinh_thuc', 'tbl_quatang.ten_qua_tang','so_luong')
       
        ->leftJoin('tbl_hinhthuckhuyenmai','tbl_chuongtrinhkhuyenmai.hinhthuckhuyenmai_id','=','tbl_hinhthuckhuyenmai.id')
        ->leftJoin('tbl_quatang', 'tbl_quatang.hinhthuckhuyenmai_id', '=', 'tbl_quatang.id')
        ->get();
       // return $chuongtrinhkhuyenmai;
        return view('admin.modules.khuyenmai.danhsachkhuyenmai' , ['data'=>$chuongtrinhkhuyenmai]);
    }
    public function chitietkhuyenmai($id)
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id','ngay_bat_dau','ngay_ket_thuc','ti_le_giam_gia','tbl_hinhthuckhuyenmai.ten_hinh_thuc', 'tbl_quatang.ten_qua_tang','so_luong')
       
        ->leftJoin('tbl_hinhthuckhuyenmai','tbl_chuongtrinhkhuyenmai.hinhthuckhuyenmai_id','=','tbl_hinhthuckhuyenmai.id')
        ->leftJoin('tbl_quatang', 'tbl_quatang.hinhthuckhuyenmai_id', '=', 'tbl_quatang.id')
        ->get();

        $danhsachsanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia', 'tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->leftJoin('tbl_chuongtrinhkhuyenmai', 'tbl_chuongtrinhkhuyenmai.sanpham_id','=','tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham', 'mo_ta', 'tag')
        ->where('tbl_chuongtrinhkhuyenmai.id','=',$id)
        ->get();
        return view('admin.modules.khuyenmai.chitietkhuyenmai', ['data'=>$chuongtrinhkhuyenmai,'data2'=>$danhsachsanpham]);
    }

//ưu đãi
    public function danhsachuudai()
    {
          $uudai = DB::table('tbl_uudai')
        ->select('tbl_uudai.id','tbl_sanpham.ten_san_pham', 'so_luong_toi_thieu', 'ti_le_giam_gia')
         ->leftJoin('tbl_hinhthucuudai', 'tbl_hinhthucuudai.sanpham_id', '=', 'tbl_hinhthucuudai.id')
          ->leftJoin('tbl_sanpham', 'tbl_hinhthucuudai.sanpham_id', '=', 'tbl_sanpham.id')
   
        ->get();
       // return ($uudai) ;
        return view('admin.modules.khuyenmai.uudai',['data'=>$uudai]);
    }

//quà tặng
    public function danhsachquatang()
    {
        $quatang = DB::table('tbl_quatang')
        ->select('tbl_quatang.id','ten_qua_tang','so_luong')
        ->get();
        return view('admin.modules.khuyenmai.quatang', ['data'=>$quatang]);
    }

//đơn hàng
    public function tatcadonhang()
    {
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','hinh_thuc_thanh_toan', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->get();

        return view('admin.modules.donhang.tatcadonhang', ['data'=>$donhang]);
    }
     public function donhangdanggiao()
    {
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','hinh_thuc_thanh_toan', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->get();

        return view('admin.modules.donhang.tatcadonhang', ['data'=>$donhang]);
    }
     public function donhangdangxuly()
    {
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','hinh_thuc_thanh_toan', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->get();

        return view('admin.modules.donhang.tatcadonhang', ['data'=>$donhang]);
    }
}
