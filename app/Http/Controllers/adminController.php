<?php
namespace App\Http\Controllers;
use App\Loai;
use App\Chi;
use App\DacDiem;
use App\SanPham;
use App\DonGia;
use Illuminate\Http\Request;
use DB;
use App\HinhAnh;
use DateTime;
use App\HinhThucKhuyenMai;
use App\ChuongTrinhKhuyenMai;
use App\UuDai;
use App\HinhThucUuDai;
use App\QuaTang;
use Carbon\Carbon;
class adminController extends Controller
{
    public function getTest()
    {
    	return view('admin.trangchu.index');	
    }
//loài hoa
    public function getdanhmuchoa()
    {

        $hoalan = DB::table('tbl_loai')
        ->orderBy('id', 'desc')
        ->paginate(10);

    	return view('admin.modules.hoalan.danhmuchoa', ['data'=>$hoalan]);
    }

    public function getChinhSuaHoa($id)
    {
        $hoalan = Loai::findOrFail($id);
        $dacdiem = DB::table('tbl_dacdiem')
        ->select('id', 'hoa', 'la', 'than', 're')
        ->orderBy('id', 'desc')
        ->get();
        // ->paginate(10);
        $loai = DB::table('tbl_loai')
        ->select('tbl_loai.id','tbl_loai.ten_loai','ten_khoa_hoc','tbl_loai.mo_ta')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->where('tbl_sanpham_loai.loai_id', '=', $id)
        ->get();

        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi')
        ->orderBy('id', 'desc')->get();
        // ->paginate(10);
         //return $loai;
        return view('admin.modules.hoalan.danhmuchoa_chinhsua', ['data'=>$hoalan , 'dacdiem'=>$dacdiem , 'chi'=>$chi, 'loai'=>$loai]);
    }
    public function themdanhmuchoa()
    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi')
        ->orderBy('id', 'desc')
        ->paginate(10);
        $dacdiem = DB::table('tbl_dacdiem')
        ->select('id', 'hoa', 'la', 'than', 're')
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('admin.modules.hoalan.themdanhmuchoa', ['data'=>$chi,'dacdiem'=>$dacdiem]);
    }

    public function postThemLoaiHoa(Request $request)
    {  
        $hoalan = new Loai();
        $hoalan->ten_loai=$request->input('ten_loai');
        $hoalan->ten_khoa_hoc=$request->input('ten_khoa_hoc');
        $hoalan->chi_id=$request->input('id_chi');
        $hoalan->dacdiem_id=$request->input('dacdiem_id');
        $hoalan->mo_ta=$request->input('mo_ta');
        $hoalan->save();
        return redirect()->intended('qt-danh-muc-hoa');

    }

    public function postChinhSuaLoaiHoa(Request $request,$id)
    {
        $hoalan = Loai::findOrFail($id);
        $hoalan->ten_loai=$request->input('ten_loai');
        $hoalan->ten_khoa_hoc=$request->input('ten_khoa_hoc');
        $hoalan->mo_ta=$request->input('mo_ta');
        $hoalan->save();
        return redirect()->intended('qt-danh-muc-hoa');
    }
    public function xoaloaihoa(Request $request,$id)
    {
       $hoalan = Loai::find($id);
        if($hoalan->delete())
        {
            return redirect()->intended('qt-danh-muc-hoa');    
        }
        else{
             return  redirect()->intended('qt-danh-muc-hoa');
        }
       
    }
//sản phẩm
    public function getdachsachsanpham()
    {
         $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        //->leftJoin('tbl_sanpham_loai','tbl_sanpham_loai.sanpham_id','=','tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','mo_ta','diem_thuong','tag')
        ->orderBy('id_sanpham','desc')
        ->paginate(5);
        // return $nguoidung;
       
    	return view('admin.modules.hoalan.danhsachsanpham',['data'=>$sanpham]);
    }
    public function themsanpham()
    {
        
        $hoalan = DB::table('tbl_loai')->get();
        // return $tmp2;
        return view('admin.modules.hoalan.themdanhsachsanpham', ['data'=>$hoalan]);
    }
    public function chinhsuasanpham($id)
    {

         $hoalan = DB::table('tbl_loai')->get();

         $danhmuahoachosanpham = DB::table('tbl_loai')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->select('ten_loai', 'tbl_sanpham.mo_ta', 'tbl_sanpham_loai.so_luong','tbl_loai.id as id_loai')
        ->get();

        $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','mo_ta','diem_thuong','tag')
        ->where('tbl_sanpham.id', '=', $id)
        ->get()->toArray();


        $hinhanhsp = DB::table('tbl_hinhanh')
        ->join('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('ten_hinh')
        ->where('tbl_hinhanh.sanpham_id', '=', $id)
        ->limit(1)
        ->get();
        // return $sanpham;
        // return $hinhanhsp;
        return view('admin.modules.hoalan.chinhsuasanpham', ['data_dmhoa'=>$danhmuahoachosanpham, 'data_sp'=>$sanpham, 'data_hinhanh'=>$hinhanhsp, 'data'=>$hoalan]);
    }
    public function postChinhSuaSanPham(Request $request,$id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->ten_san_pham=$request->input('ten_san_pham');
      
       // $sanpham->thong_tin_chi_tiet=$request->input('kich_thuoc');
        $sanpham->mo_ta=$request->input('mo_ta');
        $sanpham->diem_thuong=$request->input('diem_thuong');
        $sanpham->tag=$request->input('tag');  
        
        $sanpham->save();


        $select_dongia = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_dongia.id as id_dongia')
        ->where('tbl_sanpham.id', '=', $id)
        ->get();
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
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','mo_ta','diem_thuong','tag')
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
       // $sanpham->thong_tin_chi_tiet=$request->input('kich_thuoc');
        $sanpham->mo_ta=$request->input('mo_ta');
        $sanpham->diem_thuong=$request->input('diem_thuong');
        $sanpham->tag=$request->input('tag');  
       // $sanpham->hinhanhsp=$request->input('hinh_anh');
        $sanpham->save();
    
        $last_sanpham = DB::table('tbl_sanpham')
        ->select('id')
        ->orderBy('id','desc')
        ->first();
        $tmp1 = json_encode($last_sanpham);
        $tmp =  ltrim($tmp1, '{"id":');
        // $tmp = str_replace($tmp1,'{"id":', '');
        $tmp2 = rtrim($tmp,'}');
  
     
        $dongia = new DonGia();
        $dongia->sanpham_id=$tmp2;
        $dongia->gia=$request->input('don_gia');
        $dongia->save();


        $date = date("Y_m_d");
        $timedate = date("h_i_s");
        $time = '_'.$date.'_'.$timedate;
        $duong_dan   = public_path().'\sanpham\\';
        $file_anh = $request->file('hinh_anh');
        $hinh_anh = \Image::make($file_anh);
        $hinh_anh->resize(286,400);
        $hinh_anh->save($duong_dan.'sanpham'.$time.'.'.$file_anh->getClientOriginalExtension());
        $hinh_anh = new HinhAnh();
        $hinh_anh->ten_hinh = "sanpham".$time.'.'.$file_anh->getClientOriginalExtension();
        $hinh_anh->sanpham_id= $tmp2;
        $hinh_anh->save();

        // return $last_sanpham;
         return redirect()->intended('qt-danh-sach-san-pham');
        //return $this::getdachsachsanpham();
    }
     public function xoasanpham(Request $request,$id)
    {
       $sanpham = SanPham::find($id);
        if($sanpham->delete())
        {
            return redirect()->intended('qt-danh-sach-san-pham');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-san-pham');
        }
       
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

    public function postChinhSuaDacDiem(Request $request,$id)
    {
         $dacdiem = DacDiem::findOrFail($id);
        $dacdiem->hoa=$request->input('hoa');
      
        $dacdiem->la=$request->input('la');
        $dacdiem->than=$request->input('than');
        $dacdiem->re=$request->input('re');
        $dacdiem->save();
         return redirect()->intended('qt-dac-diem-hoa');
    }
    public function xoadacdiem(Request $request,$id)
    {
       $dacdiem = DacDiem::find($id);
        if($dacdiem->delete())
        {
            return redirect()->intended('qt-dac-diem-hoa');    
        }
        else{
             return  redirect()->intended('qt-dac-diem-hoa');
        }
       
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
         $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi', 'mo_ta')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('admin.modules.chi.chinhsuachi', ['data'=>$chi]);
    }
    public function postChinhSuaChi(Request $request, $id)
    {
        $chi = Chi::findOrFail($id);
        $chi->ten_chi=$request->input('ten_chi');
      
        $chi->mo_ta=$request->input('mo_ta');
      
        $chi->save();
         return redirect()->intended('qt-chi');
    }

      public function xoachi(Request $request,$id)
    {
       $chi = Chi::find($id);
        if($chi->delete())
        {
            return redirect()->intended('qt-chi');    
        }
        else{
             return  redirect()->intended('qt-chi');
        }
       
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
        ->paginate(10);



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
    public function ChiTietNguoiDung($id)
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
        ->where('tbl_donhang.nguoidung_id','=',$id)
        ->orderBy('tbl_donhang.id', 'desc')
        ->paginate(5);

        $nguoidung = DB::table('tbl_nguoidung')
        ->join('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->join('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->join('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->join('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->join('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_thongtinlienhe.ten','so_nha', 'ten_duong','so_dien_thoai', 'email', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho')
        ->where('tbl_nguoidung.id','=',$id)
        ->get();
        // return $nguoidung;
       return view('admin.modules.nguoidung.chitietnguoidung',['data'=>$donhang,'nguoidung'=>$nguoidung]);
    }
       public function xoanguoidung(Request $request,$id)
    {
       $nguoidung = NguoiDung::find($id);
        if($nguoidung->delete())
        {
            return redirect()->intended('qt-danh-sach-nguoi-dung');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-nguoi-dung');
        }
       
    }
//khuyến mãi

    public function getdanhsachkhuyenmai()
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id as chuongtrinhkhuyenmai_id','ngay_bat_dau','ngay_ket_thuc','ti_le_giam_gia', 'tbl_hinhthuckhuyenmai.id as hinhthuckhuyenmai_id','tbl_hinhthuckhuyenmai.ten_hinh_thuc', 'tbl_quatang.ten_qua_tang','so_luong')
       
        ->leftJoin('tbl_hinhthuckhuyenmai','tbl_chuongtrinhkhuyenmai.hinhthuckhuyenmai_id','=','tbl_hinhthuckhuyenmai.id')
        ->leftJoin('tbl_quatang', 'tbl_quatang.hinhthuckhuyenmai_id', '=', 'tbl_quatang.id')
        ->orderBy('tbl_chuongtrinhkhuyenmai.id', 'DESC')
        // ->distict()
        ->paginate(10);
       // return $chuongtrinhkhuyenmai;
        return view('admin.modules.khuyenmai.danhsachkhuyenmai' , ['data'=>$chuongtrinhkhuyenmai]);
    }
    public function chitietkhuyenmai($id)
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id as chuongtrinhkhuyenmai_id ','ngay_bat_dau','ngay_ket_thuc','ti_le_giam_gia','tbl_hinhthuckhuyenmai.ten_hinh_thuc', 'tbl_quatang.ten_qua_tang','so_luong')
       
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
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id as chuongtrinhkhuyenmai_id','ngay_bat_dau','ngay_ket_thuc','ti_le_giam_gia','tbl_hinhthuckhuyenmai.ten_hinh_thuc', 'tbl_quatang.ten_qua_tang','so_luong')
       
        ->leftJoin('tbl_hinhthuckhuyenmai','tbl_chuongtrinhkhuyenmai.hinhthuckhuyenmai_id','=','tbl_hinhthuckhuyenmai.id')
        ->leftJoin('tbl_quatang', 'tbl_quatang.hinhthuckhuyenmai_id', '=', 'tbl_quatang.id')
        ->orderBy('tbl_chuongtrinhkhuyenmai.id', 'DESC')
        ->get();

        // return $chuongtrinhkhuyenmai;
      return view('admin.modules.khuyenmai.chinhsuakhuyenmai' ,['data'=>$chuongtrinhkhuyenmai]);
    }


    public function postChinhsuakhuyenmai(Request $request, $id)
    {
        $khuyenmai = HinhThucKhuyenMai::findOrFail($id);
        $khuyenmai->ten_hinh_thuc=$request->input('ten_hinh_thuc');
        $khuyenmai->ti_le_giam_gia=$request->input('ti_le_giam_gia');
        $khuyenmai->save();




        return  redirect()->intended('qt-danh-sach-khuyen-mai');


    }
       public function xoakhuyenmai(Request $request,$id)
    {
       $khuyenmai = HinhThucKhuyenMai::find($id);
        if($khuyenmai->delete())
        {
            return redirect()->intended('qt-danh-sach-khuyen-mai');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-khuyen-mai');
        }
       
    }
//ưu đãi
    public function danhsachuudai()
    {
        $uudai = DB::table('tbl_uudai')
        ->select('tbl_uudai.id','tbl_sanpham.ten_san_pham', 'so_luong_toi_thieu', 'ti_le_giam_gia', 'tbl_hinhthucuudai.ten_hinh_thuc')
        ->join('tbl_hinhthucuudai', 'tbl_hinhthucuudai.uudai_id','=', 'tbl_uudai.id' )

        ->join('tbl_sanpham', 'tbl_sanpham.id','=', 'tbl_hinhthucuudai.sanpham_id' )
        ->orderBy('tbl_uudai.id', 'DESC')
        ->paginate(10);
       // return ($uudai) ;
        return view('admin.modules.khuyenmai.uudai',['data'=>$uudai]);
    }
    public function themuudai()
    {
        $danhsachsanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia', 'tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->leftJoin('tbl_chuongtrinhkhuyenmai', 'tbl_chuongtrinhkhuyenmai.sanpham_id','=','tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham', 'mo_ta', 'tag')
    
        ->get();
        return view('admin.modules.khuyenmai.themuudai', ['data'=>$danhsachsanpham]);
    }
    public function postThemUuDai(Request $request)
    {
        $uudai = new UuDai();
        $uudai->so_luong_toi_thieu=$request->input('so_luong_toi_thieu');
        $uudai->ti_le_giam_gia=$request->input('ti_le_giam_gia');
        $uudai->save();


        $last_uudai = DB::table('tbl_uudai')
        ->select('id')
        ->orderBy('id','desc')
        ->first();
        $tmp1 = json_encode($last_uudai);
        $tmp =  ltrim($tmp1, '{"id":');
        // $tmp = str_replace($tmp1,'{"id":', '');
        $tmp2 = rtrim($tmp,'}');


        $hinhthucuudai = new HinhThucUuDai;
        $hinhthucuudai->ten_hinh_thuc=$request->input('ten_hinh_thuc');
        $hinhthucuudai->sanpham_id=$request->input('ten_san_pham');
        $hinhthucuudai->uudai_id=$tmp2;
        $hinhthucuudai->save();

        // $hinhthucuudai = DB::table('tbl_hinhthucuudai')
        // ->select('tbl_uudai.id','tbl_sanpham.ten_san_pham', 'so_luong_toi_thieu', 'ti_le_giam_gia', 'tbl_hinhthucuudai.ten_hinh_thuc')
        // ->leftJoin('tbl_uudai', 'tbl_hinhthucuudai.uudai_id', '=','tbl_uudai.id')
        // ->leftJoin('tbl_sanpham', 'tbl_hinhthucuudai.sanpham_id', '=', 'tbl_sanpham.id')
        // ->get();
       // return $chuongtrinhkhuyenmai;
       // return view('admin.modules.khuyenmai.uudai' , ['data'=>$uudai,'data2'=>$hinhthucuudai]);
         return redirect()->intended('qt-danh-sach-uu-dai');

    }
    public function chinhsuauudai($id)
    {
         $uudai = DB::table('tbl_uudai')
        ->select('tbl_uudai.id','ten_hinh_thuc','ten_san_pham','ti_le_giam_gia','so_luong_toi_thieu')
        ->leftJoin('tbl_hinhthucuudai','tbl_hinhthucuudai.uudai_id','=','tbl_hinhthucuudai.id')
        ->leftJoin('tbl_sanpham', 'tbl_hinhthucuudai.sanpham_id', '=', 'tbl_sanpham.id')
       ->orderBy('tbl_hinhthucuudai.id', 'DESC')
        ->get();
        return view('admin.modules.khuyenmai.chinhsuauudai', ['uudai'=>$uudai]);
    }
     public function postChinhSuaUuDai(Request $request,$id)
    {
        $uudai = UuDai::findOrFail($id);
        $uudai->so_luong_toi_thieu=$request->input('so_luong_toi_thieu');
        $uudai->ti_le_giam_gia=$request->input('ti_le_giam_gia');
        $uudai->save();
        return redirect()->intended('qt-danh-sach-uu-dai');
    }
   public function xoauudai(Request $request,$id)
    {
       $uudai = UuDai::find($id);
        if($uudai->delete())
        {
            return redirect()->intended('qt-danh-sach-uu-dai');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-uu-dai');
        }
       
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
        $quatang = DB::table('tbl_quatang')
        ->select('tbl_quatang.id','ten_qua_tang','so_luong')
        ->get();
        
        return view('admin.modules.khuyenmai.themquatang',['data'=>$quatang]);
    }
    public function postThemQuaTang(Request $request)
    {
        $quatang = new QuaTang();
        $quatang->ten_qua_tang=$request->input('ten_qua_tang');
        $quatang->so_luong=$request->input('so_luong');
        $quatang->save();


        // $last_uudai = DB::table('tbl_uudai')
        // ->select('id')
        // ->orderBy('id','desc')
        // ->first();
        // $tmp1 = json_encode($last_uudai);
        // $tmp =  ltrim($tmp1, '{"id":');
        // // $tmp = str_replace($tmp1,'{"id":', '');
        // $tmp2 = rtrim($tmp,'}');


        // $hinhthucuudai = new HinhThucUuDai;
        // $hinhthucuudai->ten_hinh_thuc=$request->input('ten_hinh_thuc');
        // $hinhthucuudai->sanpham_id=$request->input('ten_san_pham');
        // $hinhthucuudai->uudai_id=$tmp2;
        // $hinhthucuudai->save();

       
         return redirect()->intended('qt-danh-sach-qua-tang');

    }





    public function chinhsuaquatang($id)
    {
        $quatang = DB::table('tbl_quatang')
        ->select('tbl_quatang.id','ten_qua_tang','so_luong')
       ->orderBy('tbl_quatang.id', 'DESC')
        ->get();
        return view('admin.modules.khuyenmai.chinhsuaquatang',['quatang'=>$quatang]);
    }
      public function postChinhsuaquatang(Request $request,$id)
    {
        $quatang = QuaTang::findOrFail($id);
        $quatang->ten_qua_tang=$request->input('ten_qua_tang');
        $quatang->so_luong=$request->input('so_luong');
        $quatang->save();
        return redirect()->intended('qt-danh-sach-qua-tang');
    }
     public function xoaquatang(Request $request,$id)
    {
       $quatang = QuaTang::find($id);
        if($quatang->delete())
        {
            return redirect()->intended('qt-danh-sach-qua-tang');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-qua-tang');
        }
       
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

        ->paginate();

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
        ->where('tbl_trangthai.ten_trang_thai' , '=', 'Đang giao')
        ->paginate();

        return view('admin.modules.donhang.danggiao', ['data'=>$donhang]);
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
        ->where('tbl_trangthai.ten_trang_thai' , '=', 'Đang xử lý')
        ->orderBy('id','desc')
        ->paginate(10);

        return view('admin.modules.donhang.dangxuly', ['data'=>$donhang]);
    }



    public function getDanhSachDonHangDaGiao()
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
        ->where('tbl_trangthai.ten_trang_thai' , '=', 'Đã giao')
        ->paginate(10);

        return view('admin.modules.donhang.dagiao', ['data'=>$donhang]);
    }
//báo cáo
    public function getBaoCaoTong()
    {
       $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
       
        ->paginate(5);
       // return $donhang;
         return view('admin.modules.baocao.baocao', ['data'=>$donhang]);
    }

    public function getBaoCaoTheoThangMot()
    {
       $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 1)
        ->paginate(5);
       // return $donhang;
        return view('admin.modules.baocao.baocao1' , ['data'=>$donhang]);
    }

        public function getBaoCaoTheoThangHai()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 2)
        ->paginate(5);
      
         return view('admin.modules.baocao.baocao2', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangBa()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 3)
        ->paginate(5);
       // return $donhang;3
     return view('admin.modules.baocao.baocao3', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangTu()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 4)
        ->paginate(5);
       return view('admin.modules.baocao.baocao4', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangNam()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 5)
        ->paginate(5);
        return view('admin.modules.baocao.baocao5', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangSau()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 6)
        ->paginate(5);
        return view('admin.modules.baocao.baocao6', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangBay()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 7)
        ->paginate(5);
      return view('admin.modules.baocao.baocao7', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangTam()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 8)
        ->paginate(5);
       return view('admin.modules.baocao.baocao8', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangChin()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 9)
        ->paginate(5);
        return view('admin.modules.baocao.baocao9', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangMuoi()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 10)
        ->paginate(5);
         return view('admin.modules.baocao.baocao10', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangMuoiMot()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 11)
        ->paginate(5);
        return view('admin.modules.baocao.baocao11', ['data'=>$donhang]);
    }
       public function getBaoCaoTheoThangMuoiHai()
    {
        $current = Carbon::now();
        $current = new Carbon();
        // get today - 2015-12-19 00:00:00
        // $date = new DateTime();
        $tmp_date = $current->month;
        $donhang = DB::table('tbl_donhang')
        ->select('tbl_donhang.id', 'ngay_dat_hang','tong_tien')
        ->whereMonth('ngay_dat_hang', '=', 12)
        ->paginate(5);
        return view('admin.modules.baocao.baocao12', ['data'=>$donhang]);
    }
}
