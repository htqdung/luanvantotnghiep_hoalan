<?php

namespace App\Http\Controllers;
use App\Loai;
use App\Chi;
use App\DacDiem;
use App\SanPham;
use Illuminate\Http\Request;
use DB;
use App\HinhThucKhuyenMai;
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
    public function themdanhmuchoa()
    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi', 'mo_ta')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('admin.modules.hoalan.themdanhmuchoa', ['data'=>$chi]);
    }
//sản phẩm
    public function getdachsachsanpham()
    {
         $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')

        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','thong_tin_chi_tiet','mo_ta','diem_thuong','tag')
        ->orderBy('id_sanpham','desc')
        ->get();
        // return $nguoidung;
       
    	return view('admin.modules.hoalan.danhsachsanpham',['data'=>$sanpham]);
    }
    public function themsanpham()
    {
        $hoalan = DB::table('tbl_loai')->get();

        return view('admin.modules.hoalan.themdanhsachsanpham', ['data'=>$hoalan]);
    }
    public function chinhsuasanpham($id)
    {
         $danhmuahoachosanpham = DB::table('tbl_loai')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->select('ten_loai', 'tbl_sanpham.mo_ta', 'tbl_sanpham_loai.so_luong','tbl_loai.id as id_loai')
        ->get();

        $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','thong_tin_chi_tiet','mo_ta','diem_thuong','tag')
        ->where('tbl_sanpham.id', '=', $id)
        ->get();

        $hinhanhsp = DB::table('tbl_hinhanh')
        ->join('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('ten_hinh')
        ->where('tbl_hinhanh.sanpham_id', '=', $id)
        ->get();
           // return $sanpham;
        // return $hinhanhsp;
        return view('admin.modules.hoalan.chinhsuasanpham', ['data_dmhoa'=>$danhmuahoachosanpham, 'data_sp'=>$sanpham, 'data_hinhanh'=>$hinhanhsp]);
    }
    public function postChinhSuaSanPham(Request $request,$id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->ten_san_pham=$request->input('ten_san_pham');
      
        $sanpham->thong_tin_chi_tiet=$request->input('kich_thuoc');
        $sanpham->mo_ta=$request->input('mo_ta');
        $sanpham->diem_thuong=$request->input('diem_thuong');
        $sanpham->tag=$request->input('tag');  
        
        $sanpham->save();
         return redirect()->intended('qt-danh-sach-san-pham');
    }



    public function chitietsanpham($id)
    {
        $danhmuahoachosanpham = DB::table('tbl_loai')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->select('ten_khoa_hoc', 'tbl_sanpham.mo_ta', 'tbl_sanpham_loai.so_luong')
        ->get();

         $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','thong_tin_chi_tiet','mo_ta','diem_thuong','tag')
        ->where('tbl_sanpham.id', '=', $id)
        ->limit(1)
        ->get();

        $hinhanhsp = DB::table('tbl_hinhanh')
        ->leftJoin('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('ten_hinh')->where('tbl_sanpham.id', '=', $id)->get();
        // return $danhmuahoachosanpham;
        // return $sanpham;
        // return $hinhanhsp;
        return view('admin.modules.hoalan.chitietsanpham', ['data_hoa'=>$danhmuahoachosanpham, 'data_sp'=>$sanpham, 'data_hinhanh'=>$hinhanhsp]);
    }
    public function postThemSanPham(Request $request)
    {
        $sanpham = new SanPham();
        $sanpham->ten_san_pham=$request->input('ten_san_pham');
      //  $sanpham->gia=$request->input('don_gia');
        $sanpham->thong_tin_chi_tiet=$request->input('kich_thuoc');
        $sanpham->mo_ta=$request->input('mo_ta');
        $sanpham->diem_thuong=$request->input('diem_thuong');
        $sanpham->tag=$request->input('tag');  
       // $sanpham->hinhanhsp=$request->input('hinh_anh');
        $sanpham->save();
         return redirect()->intended('qt-danh-sach-san-pham');
        //return $this::getdachsachsanpham();
    }
//đặc điểm
    public function getdacdiemhoa()
    {
         $dacdiem = DB::table('tbl_dacdiem')
          ->select('id','hoa','la','than','re')
        ->orderBy('id','desc')
        ->paginate(10);   
    	return view('admin.modules.dacdiemhoa.dacdiem',['data'=>$dacdiem]);
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
    public function postThemDacDiem(Request $request)
    {
        $dacdiem = new DacDiem();
        $dacdiem->hoa=$request->input('hoa');
        $dacdiem->la=$request->input('la');
        $dacdiem->than=$request->input('than');
        $dacdiem->re=$request->input('re');
        $dacdiem->save();

        return $this::getdacdiemhoa();
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
    public function postThemChi(Request $request)
    {
        $chi = new Chi();
        $chi->ten_chi=$request->input('ten_chi');
        $chi->mo_ta=$request->input('mo_ta');
        $chi->save();

        return $this::getchi();
    }
    public function chinhsuachi($id)
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
    public function chinhsuanguoidung($id)
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
        ->orderBy('tbl_chuongtrinhkhuyenmai.id', 'DESC')
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
    public function themkhuyenmai()
    {
        return view('admin.modules.khuyenmai.themkhuyenmai');
    }

    public function postThemKhuyenMai(Request $request)
    {
        // echo "abc";
        $khuyenmai = new HinhThucKhuyenMai();
        $khuyenmai->ten_hinh_thuc=$request->input('ten_khuyen_mai');
        $khuyenmai->ti_le_giam_gia=$request->input('ti_le_giam');
        $khuyenmai->save();
         $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id','ngay_bat_dau','ngay_ket_thuc','ti_le_giam_gia','tbl_hinhthuckhuyenmai.ten_hinh_thuc', 'tbl_quatang.ten_qua_tang','so_luong', 'tbl_chuongtrinhkhuyenmai.created_at')
       
        ->leftJoin('tbl_hinhthuckhuyenmai','tbl_chuongtrinhkhuyenmai.hinhthuckhuyenmai_id','=','tbl_hinhthuckhuyenmai.id')
        ->leftJoin('tbl_quatang', 'tbl_quatang.hinhthuckhuyenmai_id', '=', 'tbl_quatang.id')
        ->orderBy('tbl_chuongtrinhkhuyenmai.id', 'DESC')
        ->get();
       // return $chuongtrinhkhuyenmai;
        return view('admin.modules.khuyenmai.danhsachkhuyenmai' , ['data'=>$chuongtrinhkhuyenmai]);
    }

    public function chinhsuakhuyenmai($id)
    {

      return view('admin.modules.khuyenmai.chinhsuakhuyenmai');
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
    public function themuudai()
    {
        return view('admin.modules.khuyenmai.themuudai');
    }
    public function chinhsuauudai($id)
    {
        return view('admin.modules.khuyenmai.chinhsuauudai');
    }

//quà tặng
    public function danhsachquatang()
    {
        $quatang = DB::table('tbl_quatang')
        ->select('tbl_quatang.id','ten_qua_tang','so_luong')
        ->get();
        return view('admin.modules.khuyenmai.quatang', ['data'=>$quatang]);
    }
    public function themquatang()
    {
        return view('admin.modules.khuyenmai.themquatang');
    }
    public function chinhsuaquatang($id)
    {
        return view('admin.modules.khuyenmai.chinhsuaquatang');
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
