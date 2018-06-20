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
use Illuminate\Support\Facades\Session;
use App\HinhThucUuDai;
use App\QuaTang;
use Carbon\Carbon;
use App\LienHe;
use App\NguoiDung;
use App\Tags;
use App\KhuyenMaiSanPham;
use App\SanPham_Loai;
use App\ThongTinLienHe;
use App\DiaChi;
use App\TrangThai_DonHang;
// use App\khuyenmai_sanpham;
use App\Http\Requests\ThemTagsRequest;
use App\Http\Requests\ThemChiRequest;
use App\Http\Requests\ChinhSuaChiRequest;
use App\Http\Requests\ThemHoaRequest;
use App\Http\Requests\ThemDacDiemRequest;
use App\Http\Requests\ThemDanhSachSanPhamRequest;
use App\Http\Requests\ChinhSuaDacDiemRequest;

use Validator;

class adminController extends Controller
{

    public function getdangnhap()
    {
        return view('admin.modules.dangnhapadmin.dangnhap');
    }
    public function postdangnhap(Request $request)
    {
       
            $rules = [
                        'username'=>'required',
                    
                        'password'=>'required',
            ];
            $messages = [
                        'username.required'=>'Tài khoản không được để trống',
                        
                        'password.required'=>'Mật khẩu không được để trống',
            ];
            $Validator = Validator::make($request->all(),$rules,$messages);
 
            if($Validator->fails())
            {
                return redirect()->back()->withErrors($Validator);
            }
            else
            {
                    $arr = [
                        'username'=>$request->username,
                        'password'=>$request->password,
                    ];
                    if(DB::table('tbl_nguoidung')->where($arr)->count()==1)
                    {
                        $data = DB::table('tbl_nguoidung')->where($arr)->first();
                        Session::flash('success','đăng nhập thành công');
                        Session::put('login',$data);
                        $nhom_id = $data->nhom_id;

                        if($nhom_id == 1 || $nhom_id == 0)
                        {

                            return redirect()->intended('qt-admin');    
                        }
                        else
                        {
                            return redirect()->back()->withErrors("Bạn không có quyền truy cập!");
                        }    
                    }
                    else
                    {
                        return redirect()->back()->withErrors("Bạn không có quyền truy cập!");
                    }
            }
        
    }

    public function LogoutAdmin()
    {
        Session::flush();
        return redirect()->route('dangnhap');
    }
    public function doimatkhau()
    {
       return view('admin.modules.dangnhapadmin.doimatkhau');
    }   
    public function postDoiMatKhau(Request $request)
    { 

        // Validation
        $mat_khau_cu_db0 = DB::table('tbl_nguoidung')
        ->select('password')
        ->where('username','=',$request->input('username'))
        ->get();
        $mat_khau_cu_input = $request->input('old_pass');
        $mat_khau_cu_db = "";
        foreach ($mat_khau_cu_db0 as $value) {
            $mat_khau_cu_db = $value->password;
        }

        $mat_khau_moi = $request->input('new_pass');
        $mat_khau_moi_2 = $request->input('re_new_pass');
        
         if(!$mat_khau_cu_input || !$mat_khau_moi ||!$mat_khau_moi_2)
        {
            return redirect()->back()->withErrors("Bạn phải nhập nhập đầy đủ thông tin!");
            exit;
        }
    
        else if($mat_khau_cu_input!=$mat_khau_cu_db)
        {
            return redirect()->back()->withErrors("Mật khẩu cũ nhập không đúng!");
            exit;
        }
        else if($mat_khau_moi!=$mat_khau_moi_2)
        {
            return redirect()->back()->withErrors("Xác nhận mật khẩu sai!");
            exit;
        }
        else 
        {
            NguoiDung::where('username',$request->input('username'))
           ->update(['password'=>$request->input('new_pass')]);
            return redirect()->intended('qt-admin');
        }
    }



    //DUYET DON HANG
    public function DuyetDonHangMoiNhan(Request $request, $id)
    {
        $trangthai = $request->input('trangthai');
        TrangThai_DonHang::where('donhang_id', $id)->delete();

        DB::table('tbl_trangthai_donhang')->insert(
            ['donhang_id' => $id, 'trangthai_id' => $trangthai]
        );
        return redirect()->intended('qt-chi-tiet-don-hang/'.$id);
        // return "asdhjkalksjkhdjh"   ;

    }
    
    public function DuyetDonHangDangXuLy($id)
    {
       TrangThai_DonHang::where('donhang_id',$id)
        ->update(['trangthai_id'=>3]);
        
    }
    public function SanPhamXemNhieu()
    {
        $sanphamxemnhieu = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham', 'tbl_dongia.gia' ,'ten_san_pham','so_luot_xem', 'so_luot_mua', 'tbl_sanpham.created_at')
        ->orderBy('so_luot_xem','desc')
        ->orderBy('so_luot_mua','desc')
        ->paginate(2);
        return $sanphamxemnhieu;
       
        // return view('admin.modules.hoalan.danhsachsanpham',['data'=>$sanpham]);
    }

    public function _GET_MONTH()
    {
        $date=  Carbon::now();
        $month[] = array();
        $minus_eleven = '-11 month';
        $minus_ten = '-10 month';
        $minus_nine = '-9 month';
        $minus_eight = '-8 month';
        $minus_seven = '-7 month';
        $minus_six = '-6 month';
        $minus_five = '-5 month';
        $minus_four = '-4 month';
        $minus_three = '-3 month';
        $minus_two = '-2 month';
        $minus_one = '-1 month';
        $minus_zero = '-0 month';
        $month_temp=0;
        for($i = 0; $i <= 11; $i++)
        {
            if($i==0)
            {
                $month_temp = $minus_zero;
            }
            else if($i==1)
            {
                $month_temp = $minus_one;
            }
            else if($i==2)
            {
                $month_temp = $minus_two;
            }
            else if($i==3)
            {
                $month_temp = $minus_three;
            }
            else if($i==4)
            {
                $month_temp = $minus_four;
            }
            else if($i==5)
            {
                $month_temp = $minus_five;
            }
            else if($i==6)
            {
                $month_temp = $minus_six;
            }
            else if($i==7)
            {
                $month_temp = $minus_seven;
            }
            else if($i==8)
            {
                $month_temp = $minus_eight;
            }
            else if($i==9)
            {
                $month_temp = $minus_nine;
            }
            else if($i==10)
            {
                $month_temp = $minus_ten;
            }
            else
            {
                $month_temp = $minus_eleven;
            }
            $month_year = strtotime ( $month_temp , strtotime ( $date ) ) ;
            $month_year = date ( 'Y-m-j' , $month_year );
            $month[$i] = date("m",strtotime($month_year));
        }
        return $month;
    }

    public function _GET_YEAR()
    {
        $date=  Carbon::now();
        $year[] = array();
        $minus_eleven = '-11 month';
        $minus_ten = '-10 month';
        $minus_nine = '-9 month';
        $minus_eight = '-8 month';
        $minus_seven = '-7 month';
        $minus_six = '-6 month';
        $minus_five = '-5 month';
        $minus_four = '-4 month';
        $minus_three = '-3 month';
        $minus_two = '-2 month';
        $minus_one = '-1 month';
        $minus_zero = '-0 month';
        $month_temp=0;
        for($i = 0; $i <= 11; $i++)
        {
            if($i==0)
            {
                $month_temp = $minus_zero;
            }
            else if($i==1)
            {
                $month_temp = $minus_one;
            }
            else if($i==2)
            {
                $month_temp = $minus_two;
            }
            else if($i==3)
            {
                $month_temp = $minus_three;
            }
            else if($i==4)
            {
                $month_temp = $minus_four;
            }
            else if($i==5)
            {
                $month_temp = $minus_five;
            }
            else if($i==6)
            {
                $month_temp = $minus_six;
            }
            else if($i==7)
            {
                $month_temp = $minus_seven;
            }
            else if($i==8)
            {
                $month_temp = $minus_eight;
            }
            else if($i==9)
            {
                $month_temp = $minus_nine;
            }
            else if($i==10)
            {
                $month_temp = $minus_ten;
            }
            else
            {
                $month_temp = $minus_eleven;
            }
            $month_year = strtotime ( $month_temp , strtotime ( $date ) ) ;
            $month_year = date ( 'Y-m-j' , $month_year );
            $year[$i] = date("Y",strtotime($month_year));
        }

        return $year;
    }

    public function DoanhThuBanHang12Thang()
    {   
        $month = $this::_GET_MONTH();
        $year = $this::_GET_YEAR();
        $data_1 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[0])
        ->whereYear('ngay_dat_hang', '=', $year[0])
        ->get();
        foreach ($data_1 as $value) {
            if($value->total_sales == NULL)
            {
                $data_1 = 0;
            }
            else
            {
                $data_1 = $value->total_sales."";    
            }
        }
        
        $data_2 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[1])
        ->whereYear('ngay_dat_hang', '=', $year[1])
        ->get();
        foreach ($data_2 as $value) {
            if($value->total_sales == NULL)
            {
                $data_2 = 0;
            }
            else
            {
                $data_2 = $value->total_sales."";    
            }
        }
        $data_3 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[2])
        ->whereYear('ngay_dat_hang', '=', $year[2])
        ->get();
        foreach ($data_3 as $value) {
            if($value->total_sales == NULL)
            {
                $data_3 = 0;
            }
            else
            {
                $data_3 = $value->total_sales."";    
            }
        }
        $data_4 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[3])
        ->whereYear('ngay_dat_hang', '=', $year[3])
        ->get();
        foreach ($data_4 as $value) {
            if($value->total_sales == NULL)
            {
                $data_4 = 0;
            }
            else
            {
                $data_4 = $value->total_sales."";    
            }
        }
        $data_5 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[4])
        ->whereYear('ngay_dat_hang', '=', $year[4])
        ->get();
        foreach ($data_5 as $value) {
            if($value->total_sales == NULL)
            {
                $data_5 = 0;
            }
            else
            {
                $data_5 = $value->total_sales."";    
            }
        }
        $data_6 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[5])
        ->whereYear('ngay_dat_hang', '=', $year[5])
        ->get();
        foreach ($data_6 as $value) {
            if($value->total_sales == NULL)
            {
                $data_6 = 0;
            }
            else
            {
                $data_6 = $value->total_sales."";    
            }
        }
        $data_7 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[6])
        ->whereYear('ngay_dat_hang', '=', $year[6])
        ->get();
        foreach ($data_7 as $value) {
            if($value->total_sales == NULL)
            {
                $data_7 = 0;
            }
            else
            {
                $data_7 = $value->total_sales."";    
            }
        }
        $data_8 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[7])
        ->whereYear('ngay_dat_hang', '=', $year[7])
        ->get();
        foreach ($data_8 as $value) {
            if($value->total_sales == NULL)
            {
                $data_8 = 0;
            }
            else
            {
                $data_8 = $value->total_sales."";    
            }
        }
        $data_9 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[8])
        ->whereYear('ngay_dat_hang', '=', $year[8])
        ->get();
        foreach ($data_9 as $value) {
            if($value->total_sales == NULL)
            {
                $data_9 = 0;
            }
            else
            {
                $data_9 = $value->total_sales."";    
            }
        }
        $data_10 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[9])
        ->whereYear('ngay_dat_hang', '=', $year[9])
        ->get();
        foreach ($data_10 as $value) {
            if($value->total_sales == NULL)
            {
                $data_10 = 0;
            }
            else
            {
                $data_10 = $value->total_sales."";    
            }
        }
        $data_11 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[10])
        ->whereYear('ngay_dat_hang', '=', $year[10])
        ->get();
        foreach ($data_11 as $value) {
            if($value->total_sales == NULL)
            {
                $data_11 = 0;
            }
            else
            {
                $data_11 = $value->total_sales."";    
            }
        }
        $data_12 = DB::table('tbl_donhang') 
        ->select( DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', $month[11])
        ->whereYear('ngay_dat_hang', '=', $year[11])
        ->get();
        foreach ($data_12 as $value) {
            if($value->total_sales == NULL)
            {
                $data_12 = 0;
            }
            else
            {
                $data_12 = $value->total_sales."";    
            }
        }

        return $data_1.",".$data_2.",".$data_3.",".$data_4.",".$data_5.",".$data_6.",".$data_7.",".$data_8.",".$data_9.",".$data_10.",".$data_11.",".$data_12;
    }

    public function TongNguoiDung()
    {
        $data  = DB::table('tbl_nguoidung')
        ->count();
        return $data;
    }

    public function TongDonHang()
    {
        $data  = DB::table('tbl_donhang')
        ->count();
        return $data;
    }


    public function TongDoanhThu()
    {
        $data = DB::table('tbl_donhang')
                ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->get();
        return $data;
    }

    public function DoanhThuNam()
    {
        
        $data_t1 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 1)
        ->get();
        foreach ($data_t1 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t1 = 0;
            }
            else
            {
                $data_t1 = $value->total_sales."";    
            }
        }
        $data_t2 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 2)
        ->get();
        foreach ($data_t2 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t2 = 0;
            }
            else
            {
                $data_t2 = $value->total_sales."";
            }
        }
        $data_t3 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 3)
        ->get();
        foreach ($data_t3 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t3 = 0;
            }
            else
            {
                $data_t3 = $value->total_sales."";
            }
            
        }        
        $data_t4 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 4)
        ->get();
        foreach ($data_t4 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t4 = 0;
            }
            else
            {
                $data_t4 = $value->total_sales."";
            }
            
        }
        $data_t5 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 5)
        ->get();
        foreach ($data_t5 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t5 = 0;
            }
            else
            {
                $data_t5 = $value->total_sales."";
            }
           
        }
        $data_t6 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 6)
        ->get();
        foreach ($data_t6 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t6 = 0;
            }
            else
            {
                $data_t6 = $value->total_sales."";
            }
           
        }
        $data_t7 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 7)
        ->get();
        foreach ($data_t7 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t7 = 0;
            }
            else
            {
                $data_t7 = $value->total_sales."";
            }
           
        }
        $data_t8 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 8)
        ->get();
        foreach ($data_t8 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t8 = 0;
            }
            else
            {
                $data_t8 = $value->total_sales."";
            }
            
        }
        $data_t9 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 9)
        ->get();
        foreach ($data_t9 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t9 = 0;
            }
            else
            {
                $data_t9 = $value->total_sales."";
            }
          
        }
        $data_t10 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 10)
        ->get();
        foreach ($data_t10 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t10 = 0;
            }
            else
            {
                $data_t10 = $value->total_sales."";
            }
           
        }
        $data_t11 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 11)
        ->get();
        foreach ($data_t11 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t11 = 0;
            }
            else
            {
                $data_t11 = $value->total_sales."";
            }
           
        }        
        $data_t12 = DB::table('tbl_donhang')
        ->select(DB::raw('SUM(tong_tien) as total_sales'))
        ->whereMonth('ngay_dat_hang', '=', 12)
        ->get();
        foreach ($data_t12 as $value) {
            if($value->total_sales == NULL)
            {
                $data_t12 = 0;
            }
            else
            {
                $data_t12 = $value->total_sales."";
            }
         
        }
        return $data_t1.",".$data_t2.",".$data_t3.",".$data_t4.",".$data_t5.",".$data_t6.",".$data_t7.",".$data_t8.",".$data_t9.",".$data_t10.",".$data_t11.",".$data_t12;
    }

    public function XoaLienHe($id)
    {
        $lienhe = LienHe::findOrFail($id)
        ->delete();
        return redirect()->intended('qt-admin')->with('message', 'Liên hệ đã xóa thành công!');
    }


    public function getTest()
    {
        if(Session::has('login'))
        {
            $data_sanphamxemnhieu = $this::SanPhamXemNhieu();
            $data_nguoidung = $this::TongNguoiDung();
            $data_donhang = $this::TongDonHang();
            $data_tongdoanhthu =  $this::TongDoanhThu();
            $data_doanhthunam = $this::DoanhThuNam();
            $lienhe = $this::lienhe();
            $data_doanhthu12thang = $this::DoanhThuBanHang12Thang();
            
            // return $data_tongdoanhthu;
            return view('admin.trangchu.index', ['data_nguoidung'=>$data_nguoidung, 'data_donhang'=>$data_donhang, 'data_tongdoanhthu'=>$data_tongdoanhthu, 'data_doanhthunam'=>$data_doanhthunam, 'data_lienhe'=>$lienhe, 'data_doanhthu12thang'=>$data_doanhthu12thang, 'data_sanphamxemnhieu'=>$data_sanphamxemnhieu]);
        }
        else
        {
            return redirect()->route('dangnhap');
        }
        	
    }
    public function lienhe()
    {
        $lienhe = DB::table('tbl_lienhe')
        ->select('tbl_lienhe.id','ngay_lien_he','tieu_de', 'noi_dung', 'ten')
        ->join('tbl_nguoidung', 'tbl_lienhe.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->join('tbl_thongtinlienhe', 'tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->orderBy('tbl_lienhe.id', 'desc')
        ->paginate(2);
        return $lienhe;
    
    }
//loài hoa 
    public function getdanhmuchoa()
    {

        $hoalan = DB::table('tbl_loai')
        ->select('tbl_loai.id','tbl_loai.ten_loai','hoa', 'la', 'than', 're', 'thoigianno', 'ten_khoa_hoc', 'ten_chi', 'tbl_loai.mo_ta')
        ->join('tbl_dacdiem', 'tbl_loai.dacdiem_id', '=', 'tbl_dacdiem.id')
        ->join('tbl_chi', 'tbl_chi.id', '=', 'tbl_loai.chi_id')
        ->orderBy('tbl_loai.id', 'desc')
        ->paginate(5);

    	return view('admin.modules.hoalan.danhmuchoa', ['data'=>$hoalan]);
    }

    public function getChinhSuaHoa($id)
    {
        $hoalan = Loai::findOrFail($id);
        $dacdiem = DB::table('tbl_dacdiem')
        ->select('id', 'hoa', 'la', 'than', 're','thoigianno')
        ->orderBy('id', 'desc')
        ->get();
        // ->paginate(10);
        $loai = DB::table('tbl_loai')
        ->select('tbl_loai.id','tbl_loai.ten_loai','ten_khoa_hoc','tbl_loai.mo_ta')
        
        ->where('tbl_loai.id', '=', $id)
        ->get();

        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi')
        ->orderBy('id', 'desc')->get();
        // ->paginate(10);
         // return $loai;
        return view('admin.modules.hoalan.danhmuchoa_chinhsua', ['data'=>$hoalan , 'dacdiem'=>$dacdiem , 'chi'=>$chi, 'loai'=>$loai]);
    }
    public function themdanhmuchoa()
    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi')
        ->orderBy('id', 'desc')
        ->paginate(10);
        $dacdiem = DB::table('tbl_dacdiem')
        ->select('tbl_dacdiem.id', 'hoa', 'la', 'than', 're','thoigianno')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('admin.modules.hoalan.themdanhmuchoa', ['data'=>$chi,'dacdiem'=>$dacdiem]);
    }

    public function postThemLoaiHoa(ThemHoaRequest $request)
    {  
        $hoalan = new Loai();
        $hoalan->ten_loai=$request->input('ten_loai');
        $hoalan->ten_khoa_hoc=$request->input('ten_khoa_hoc');
        $hoalan->chi_id=$request->input('id_chi');
        $hoalan->dacdiem_id=$request->input('dacdiem_id');
        $hoalan->mo_ta=$request->input('mo_ta');
        $hoalan->save();
        $tenhoa = $request->input('ten_loai');
        $mss = 'Hoàn tất, Loài '.$tenhoa.' đã được thêm! ';
        return redirect()->intended('qt-danh-muc-hoa')->with('message', $mss);

    }

    public function postChinhSuaLoaiHoa(ThemHoaRequest $request,$id)
    {
        $hoalan = Loai::findOrFail($id);
        $hoalan->ten_loai=$request->input('ten_loai');
        $hoalan->ten_khoa_hoc=$request->input('ten_khoa_hoc');
        $hoalan->chi_id=$request->input('id_chi');
        $hoalan->dacdiem_id=$request->input('dacdiem_id');
        $hoalan->mo_ta=$request->input('mo_ta');
        $hoalan->save();
        $tenhoa = $request->input('ten_loai');
        $mss = 'Hoàn tất, Loài '.$tenhoa.' đã được chỉnh sửa! ';
        return redirect()->intended('qt-danh-muc-hoa')->with('message', $mss);
    }
    public function xoaloaihoa(Request $request,$id)
    {
       $hoalan = Loai::find($id);
        if($hoalan->delete())
        {
            return redirect()->intended('qt-danh-muc-hoa')->with('message', 'Loài hoa đã được xóa thành công!');    
        }
        else{
             return  redirect()->intended('qt-danh-muc-hoa');
        }
       
    }
     public function chitietloaihoa($id)
    {
         $hoalan = Loai::findOrFail($id);
         $dacdiem = DB::table('tbl_dacdiem')
        ->select('tbl_dacdiem.id', 'hoa', 'la', 'than', 're','thoigianno')
        ->join('tbl_loai', 'tbl_dacdiem.id', '=', 'tbl_loai.dacdiem_id')
        ->where('tbl_loai.id', '=', $id)
        ->orderBy('tbl_dacdiem.id', 'desc')
        ->get();
        // ->paginate(10);
        // $loai = DB::table('tbl_loai')
        // ->select('tbl_loai.id','tbl_loai.ten_loai','ten_khoa_hoc','tbl_loai.mo_ta')
        // ->where('tbl_loai.ten_loai', '=', $id)
        // ->get();

        $chi = DB::table('tbl_chi')
        ->select('tbl_chi.id', 'ten_chi')
        ->join('tbl_loai', 'tbl_chi.id', '=', 'tbl_loai.chi_id')
        ->where('tbl_loai.id', '=', $id)
        ->orderBy('tbl_chi.id', 'desc')
        ->get();
        // ->paginate(10);
         // return $loai;
        return view('admin.modules.hoalan.chitietloaihoa', ['data'=>$hoalan , 'dacdiem'=>$dacdiem , 'chi'=>$chi]);
    }
//sản phẩm
    public function getdachsachsanpham()
    {
        $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','mo_ta','diem_thuong', 'kich_thuoc')
        ->orderBy('id_sanpham','desc')
        ->paginate(5);
        
        

       
    	return view('admin.modules.hoalan.danhsachsanpham',['data'=>$sanpham]);
    }


    public function layDanhMucLoaiHoa($id)
    {

        $hinhanhsp = DB::table('tbl_hinhanh')
        ->join('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('ten_hinh')
        ->where('sanpham_id','=', $id)
        ->get()->toArray();

        $danhmuahoachosanpham = DB::table('tbl_loai')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->select('ten_loai')
        ->where('tbl_sanpham.id', '=', $id)
        ->get()->toArray();

        return array_merge($danhmuahoachosanpham,$hinhanhsp);
        // return $danhmuahoachosanpham;
    }


    public function layHinhAnhSanPham($id)
    {
        $hinhanhsp = DB::table('tbl_hinhanh')
        ->join('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('ten_hinh')
        ->where('sanpham_id','=', $id)
        ->get();
        return $hinhanhsp;
    }



    public function themsanpham()
    {
        

        $tags = DB::table('tbl_tags')->get();
        $hoalan = DB::table('tbl_loai')->get();
        // return $tmp2;
        return view('admin.modules.hoalan.themdanhsachsanpham', ['data'=>$hoalan , 'tags'=>$tags]);
    }
    public function postThemSanPham(ThemDanhSachSanPhamRequest $request)
    {
        $sanpham = new SanPham();
        $sanpham->ten_san_pham=$request->input('ten_san_pham');
        $sanpham->kich_thuoc=$request->input('kich_thuoc');
        $sanpham->mo_ta=$request->input('mo_ta');
        $sanpham->diem_thuong=$request->input('diem_thuong');
        $sanpham->so_luot_xem = 0;
        $sanpham->so_luot_mua = 0;
       
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
        $dongia->gia=$request->input('gia');
        $dongia->save();

        $chieungang = 1170;
        $chieudoc = 500;
            
        if($request->input('ngang') != NULL ||$request->input('doc') != NULL) {
            $chieungang = $request->input('ngang');
            $chieudoc = $request->input('doc');
        }
        else
        {
            $chieungang = 1170;
            $chieudoc = 500;
        }



        $date = date("Y_m_d");
        $timedate = date("h_i_s");
        $time = '_'.$date.'_'.$timedate;
        $duong_dan   = public_path().'\sanpham\\';
        if ($request->hasFile('ten_hinh')){
            if( $file_anh = $request->file('ten_hinh'))
            {
                for($i = 0; $i < sizeof($file_anh); $i++)
                {
                    if($i == 0)
                    {
                        $hinh_anh = \Image::make($file_anh[$i]);
                        $hinh_anh->resize($chieungang,$chieudoc);
                        $hinh_anh->save($duong_dan.'sanpham'.$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension());
                        $hinh_anh = new HinhAnh();
                        $hinh_anh->ten_hinh = "sanpham".$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension();
                        $hinh_anh->sanpham_id= $tmp2;
                        $hinh_anh->save();             
                    }
                    else{
                        $hinh_anh = \Image::make($file_anh[$i]);
                        $hinh_anh->resize(286,400);
                        $hinh_anh->save($duong_dan.'sanpham'.$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension());
                        $hinh_anh = new HinhAnh();
                        $hinh_anh->ten_hinh = "sanpham".$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension();
                        $hinh_anh->sanpham_id= $tmp2;
                        $hinh_anh->save();            
                    }

                }
            }
        }


        $tags = new Tags();
        // $tags->ten_tags=$request->input('ten_tags');

        $tags = "".$request->input('ten_tags');
        $tag_name = explode(",", $tags);

        $loai= $request->input('themloai');
        
        // return $loai;
        for($j = 0; $j < sizeof($loai); $j++ )
        {
            $tag = new SanPham_Loai();
            $tag->loai_id = $loai[$j];
            $tag->sanpham_id = $tmp2;
            $tag->save();
        }

        $tags_save = [];
        for($i=0; $i<  sizeof($tag_name); $i++)
        {
            $tag = new Tags();
            $tag->ten_tags = $tag_name[$i];
            $tag->sanpham_id = $tmp2;
            $tag->save();
        }
        return redirect()->intended('qt-danh-sach-san-pham')->with('message','Thêm sản phẩm '.$request->input('ten_san_pham').' thành công!');

    }


    //đang làm
    public function chinhsuasanpham($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $tag = DB::table('tbl_tags')
        ->select('id', 'ten_tags')
        ->where('sanpham_id', '=', $id)
        ->get();

        $danhmuahoachosanpham = DB::table('tbl_loai')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->select('tbl_loai.id as loai_id','ten_loai','tbl_sanpham_loai.id as sanphamloai_id' ,'ten_khoa_hoc' ,'tbl_sanpham.mo_ta', 'tbl_sanpham_loai.so_luong','tbl_loai.id as id_loai','tbl_sanpham.mo_ta')
        ->where('tbl_sanpham.id', '=', $id)
        ->get();

        $danhmuahoa = DB::table('tbl_loai')
        ->select('id as loai_id','ten_loai')
        ->get();

        $dongia = DB::table('tbl_dongia')
        ->select('tbl_dongia.gia', 'tbl_dongia.id as dongia_id', 'ngay_ap_dung')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_dongia.sanpham_id')
        ->orderBy('ngay_ap_dung', 'DESC')
        ->where('sanpham_id','=', $id)
        ->limit(1)->get();


        $hinhanhsp = DB::table('tbl_hinhanh')
        ->join('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('tbl_hinhanh.id','ten_hinh')
        ->where('tbl_hinhanh.sanpham_id', '=', $id)
        ->get();
        // return $danhmuahoa;
        // return $hinhanhsp;
        return view('admin.modules.hoalan.chinhsuasanpham', ['data_dmhoa2'=>$danhmuahoa,'data_dmhoa'=>$danhmuahoachosanpham, 'data_sp'=>$sanpham, 'data_hinhanh'=>$hinhanhsp,
            'data_tags'=>$tag, 'data_gia'=> $dongia]);
    }
    public function postChinhSuaSanPham(Request $request,$id)
    {


        $sanpham = SanPham::findOrFail($id);
        $sanpham->ten_san_pham=$request->input('ten_san_pham');
        $sanpham->kich_thuoc=$request->input('kich_thuoc');
        $sanpham->mo_ta=$request->input('mo_ta');
        $sanpham->diem_thuong=$request->input('diem_thuong');
        $sanpham->save();
        
        $dongia_id = $request->input('dongia_id');
        $dongia = DonGia::findOrFail($dongia_id);

        // return $dongia_id;
        $dongia->sanpham_id=$id;
        $dongia->gia=$request->input('gia');
        $dongia->save();
    
        $date = date("Y_m_d");
        $timedate = date("h_i_s");
        $time = '_'.$date.'_'.$timedate;
        $duong_dan   = public_path().'\sanpham\\';
        $chieungang = 1170;
        $chieudoc = 500;
            
        if($request->input('ngang') != NULL || $request->input('doc') != NULL) {
            $chieungang = $request->input('ngang');
            $chieudoc = $request->input('doc');
        }
        else
        {
            $chieungang = 1170;
            $chieudoc = 500;
        }
        if ($request->hasFile('ten_hinh')){
            if( $file_anh = $request->file('ten_hinh'))
            {
                for($i = 0; $i < sizeof($file_anh); $i++)
                {
                    if($i==0)
                    {
                        $hinh_anh = \Image::make($file_anh[$i]);
                        $hinh_anh->resize($chieungang,$chieudoc);
                        $hinh_anh->save($duong_dan.'sanpham'.$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension());
                        $hinh_anh = new HinhAnh();
                        $hinh_anh->ten_hinh = "sanpham".$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension();
                        $hinh_anh->sanpham_id= $id;
                        $hinh_anh->save();   
                    }
                    else
                    {
                        $hinh_anh = \Image::make($file_anh[$i]);
                        $hinh_anh->resize(286,400);
                        $hinh_anh->save($duong_dan.'sanpham'.$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension());
                        $hinh_anh = new HinhAnh();
                        $hinh_anh->ten_hinh = "sanpham".$time.$i.'.'.$file_anh[$i]->getClientOriginalExtension();
                        $hinh_anh->sanpham_id= $id;
                        $hinh_anh->save();             
                    }
                }
            }
        }
        // $tags->ten_tags=$request->input('ten_tags');
        $id_tag = DB::table('tbl_tags')->where('sanpham_id', $id)->select('id')->get();
        $id_sp_loai = DB::table('tbl_sanpham_loai')->where('sanpham_id', $id)->select('id')->get();

        foreach ($id_sp_loai as $value) {
            DB::table('tbl_sanpham_loai')->where('id', $value->id)->delete();    
        }
        foreach ($id_tag as $value) {
            DB::table('tbl_tags')->where('id', $value->id)->delete();    
        }
        $tags = "".$request->input('ten_tags');
        $tag_name = explode(",", $tags);

        $loai= $request->input('themloai');
        
        for($j = 0; $j < sizeof($loai); $j++ )
        {
            $tag = new SanPham_Loai();
            $tag->loai_id = $loai[$j];
            $tag->sanpham_id = $id;
            $tag->save();
        }

        $tags_save = [];
        for($i=0; $i<  sizeof($tag_name); $i++)
        {
            $tag = new Tags();
            $tag->ten_tags = $tag_name[$i];
            $tag->sanpham_id = $id;
            $tag->save();
        }
        return redirect()->intended('qt-danh-sach-san-pham')->with('message','Chỉnh sửa sản phẩm '.$request->input('ten_san_pham').' thành công!');

    // return "DUNG"      


    }
    public function chitietsanpham($id)
    {
        $danhmuahoachosanpham = DB::table('tbl_loai')
        ->join('tbl_sanpham_loai', 'tbl_sanpham_loai.loai_id', '=', 'tbl_loai.id')
        ->join('tbl_sanpham', 'tbl_sanpham.id', '=', 'tbl_sanpham_loai.sanpham_id')
        ->select('ten_khoa_hoc', 'tbl_sanpham.mo_ta', 'tbl_sanpham_loai.so_luong')
        ->where('tbl_sanpham.id', '=', $id)
        ->get();

         $sanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia','tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham','gia','mo_ta','diem_thuong')
        ->where('tbl_sanpham.id', '=', $id)
        ->limit(1)
        ->get();

        $danhgia = DB::table('tbl_danhgia')
        ->leftJoin('tbl_nguoidung','tbl_danhgia.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_sanpham','tbl_danhgia.sanpham_id', '=', 'tbl_sanpham.id')
        ->select('tbl_danhgia.id as id_danhgia','danh_gia','ten','ngay_danh_gia','noi_dung')
        ->where('tbl_danhgia.sanpham_id', '=', $id)
        ->get();

        $hinhanhsp = DB::table('tbl_hinhanh')
        ->leftJoin('tbl_sanpham', 'tbl_hinhanh.sanpham_id' ,'=', 'tbl_sanpham.id')
        ->select('ten_hinh')
        ->where('tbl_sanpham.id', '=', $id)
        ->get();
        // return $danhmuahoachosanpham;
        // return $sanpham;
        // return $hinhanhsp;
        
        return view('admin.modules.hoalan.chitietsanpham', ['data_hoa'=>$danhmuahoachosanpham, 'data_sp'=>$sanpham, 'data_hinhanh'=>$hinhanhsp, 'data_danhgia'=>$danhgia]);
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
          ->select('id','hoa','la','than','re', 'thoigianno','dac_diem_sinh_truong')
        ->orderBy('id','desc')
        ->paginate(5);   
    	return view('admin.modules.dacdiemhoa.dacdiem',['data'=>$dacdiem]);
    }
    public function chinhsuadacdiem($id)
    {


        $dacdiem = DB::table('tbl_dacdiem')
         ->select('id','hoa','la','than','re', 'thoigianno','dac_diem_sinh_truong')
        ->orderBy('id','desc')
        ->get();

        return view('admin.modules.dacdiemhoa.chinhsuadacdiem', ['data'=>$dacdiem]);
    }
    public function themdacdiem()
    {


        return view('admin.modules.dacdiemhoa.themdacdiem');
    }
    public function postThemDacDiem(ThemDacDiemRequest $request)
    {

        $nhiet_do = $request->input('nhiet_do');
        $anh_sang = $request->input('anh_sang');
        $do_am = $request->input('do_am');
        $saubenh = $request->input('van_de_sau_benh');
        $dacdiem_sinhtruong = $nhiet_do.",".$anh_sang
        .",".$do_am.",".$saubenh;

        $dacdiem = new DacDiem();
        $dacdiem->hoa=$request->input('hoa');
        $dacdiem->la=$request->input('la');
        $dacdiem->than=$request->input('than');
        $dacdiem->re=$request->input('re');
        $dacdiem->thoigianno=$request->input('thoigianno');
        $dacdiem->dac_diem_sinh_truong=$dacdiem_sinhtruong;
        
        $dacdiem->save();

        return redirect()->intended('qt-dac-diem-hoa')->with('message', 'Hoàn tất, Đã thêm mới một đặc điểm!');
    }

    public function postChinhSuaDacDiem(ChinhSuaDacDiemRequest $request,$id)
    {

        $nhiet_do = $request->input('nhiet_do');
        $anh_sang = $request->input('anh_sang');
        $do_am = $request->input('do_am');
        $saubenh = $request->input('van_de_sau_benh');
        $dacdiem_sinhtruong = $nhiet_do.",".$anh_sang
        .",".$do_am.",".$saubenh;
        $dacdiem = DacDiem::findOrFail($id);
        $dacdiem->hoa=$request->input('hoa');
        $dacdiem->la=$request->input('la');
        $dacdiem->than=$request->input('than');
        $dacdiem->re=$request->input('re');
        $dacdiem->thoigianno=$request->input('thoigianno');
        $dacdiem->dac_diem_sinh_truong=$dacdiem_sinhtruong;
        $name = $request->input('hoa');
        $dacdiem->save();
        return redirect()->intended('qt-dac-diem-hoa')->with('message', 'Hoàn tất, Đã chỉnh sửa đặc điểm '.$name);
    }
    public function xoadacdiem(Request $request,$id)
    {
       $dacdiem = DacDiem::find($id);
        if($dacdiem->delete())
        {
            return redirect()->intended('qt-dac-diem-hoa')->with('message', 'Hoàn tất, Đã xóa một đặc điểm!');    
        }
        else{
             return  redirect()->intended('qt-dac-diem-hoa')->with('errors', "Lỗi! Không thể xóa!");;
        }
       
    }

//chi
    public function getchi()
    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi','ten_khoa_hoc_chi','chi_than','chi_re','chi_la','chi_hoa','chi_canh' ,'mo_ta')
        ->orderBy('id', 'desc')
        ->paginate(5);

    	return view('admin.modules.chi.chi', ['data'=>$chi]);
    }
    public function themchi()
    {
       return view('admin.modules.chi.themchi');
    }
    public function postThemChi(ThemChiRequest $request)
    {
        $chi = new Chi();
        $chi->ten_chi=$request->input('ten_chi');
        $chi->ten_khoa_hoc_chi=$request->input('ten_khoa_hoc_chi');
        $chi->chi_than=$request->input('chi_than');
        $chi->chi_re=$request->input('chi_re');
        $chi->chi_la=$request->input('chi_la');
        $chi->chi_canh=$request->input('chi_canh');
        $chi->chi_hoa=$request->input('chi_hoa');
        $chi->mo_ta=$request->input('mo_ta');
        $chi->save();
        return redirect()->intended('qt-chi')->with('message', "Hoàn tất, Đã thêm chi mới");
        
    }
    public function chinhsuachi($id)

    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi','ten_khoa_hoc_chi','chi_than','chi_re','chi_la','chi_hoa','chi_canh' ,'mo_ta')
        ->orderBy('id', 'desc')
        ->where('id', '=', $id)->get();

        return view('admin.modules.chi.chinhsuachi', ['data'=>$chi]);
    }
    public function postChinhSuaChi(ChinhSuaChiRequest $request, $id)
    {
        $chi = Chi::findOrFail($id);
        $chi->ten_chi=$request->input('ten_chi');
        $chi->ten_khoa_hoc_chi=$request->input('ten_khoa_hoc_chi');
        $chi->chi_than=$request->input('chi_than');
        $chi->chi_re=$request->input('chi_re');
        $chi->chi_la=$request->input('chi_la');
        $chi->chi_canh=$request->input('chi_canh');
        $chi->chi_hoa=$request->input('chi_hoa');
        $chi->mo_ta=$request->input('mo_ta');
        $chi->save();
        $name = $request->input('ten_chi');
        return redirect()->intended('qt-chi')->with('message', 'Hoàn tất, Đã chỉnh sửa chi '.$name);
    }

      public function xoachi(Request $request,$id)
    {
       $chi = Chi::find($id);
        if($chi->delete())
        {
            return redirect()->intended('qt-chi')->with('message', "Hoàn tất, Đã xóa chi!"); 
        }
        else{
             return  redirect()->intended('qt-chi')->with('errors', "Lỗi! Không thể xóa!");
        }
       
    }
     public function chitietchi($id)
    {
        $chi = DB::table('tbl_chi')
        ->select('id', 'ten_chi','ten_khoa_hoc_chi','chi_than','chi_re','chi_la','chi_hoa','chi_canh' ,'mo_ta')
        ->where('tbl_chi.id', '=' , $id)
        ->get();
        return view('admin.modules.chi.chitietchi', ['data'=>$chi]);
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
        ->orderBy('tbl_nguoidung.id', 'desc')
        ->where('nhom_id', '=', '2')

        ->paginate(5);
       
        // return $nguoidung;
        return view('admin.modules.nguoidung.danhsachnguoidung' , ['data'=>$nguoidung]);
    }

    public function getnguoidungadmin()
    {
        $nguoidung = DB::table('tbl_nguoidung')
        ->join('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->join('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->join('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->join('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->join('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->join('tbl_nhom', 'tbl_nhom.id', '=','tbl_nguoidung.nhom_id' )
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_thongtinlienhe.ten','so_nha', 'ten_duong','so_dien_thoai', 'email', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho', 'tbl_thongtinlienhe.id as id_lienhe')

        ->orderBy('tbl_nguoidung.id', 'desc')
        ->where('tbl_nhom.id', '=', 1)
        ->paginate(10);
        // return $nguoidung;
        return view('admin.modules.nguoidung.danhsachadmin' , ['data'=>$nguoidung]);
    }

    public function themnguoidung()
    {
        $thanhpho = DB::table('tbl_tinh_thanhpho')
        ->select('id', 'ten_tinh_thanhpho')
        ->get();


        $thongtinlienhe= DB::table('tbl_thongtinlienhe')
        ->select( 'ten','so_nha', 'ten_duong','so_dien_thoai', 'email', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho')
        ->join('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->join('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->join('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->join('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->get();
           
        return view('admin.modules.nguoidung.themnguoidung',['data'=>$thongtinlienhe, 'tinhthanhpho'=>$thanhpho]);
    }
    public function postThemnguoidungadmin(Request $request)
    {
       
        $diachi = new DiaChi();
        $diachi->so_nha = $request->input('so_nha');
        $diachi->ten_duong = $request->input('ten_duong');
        $diachi->phuongxa_id = $request->input('phuongxa');
        $diachi->save();

        $diachi1 = DB::table('tbl_diachi')
        ->select('tbl_diachi.id')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->get();



        $diachi_id =0;
        foreach ($diachi1 as $item) {
           $diachi_id = $item->id;
        }


        $thongtinlienhe =new ThongTinLienHe();
        $thongtinlienhe->ten=$request->input('ten');
        $thongtinlienhe->so_dien_thoai=$request->input('so_dien_thoai');
        $thongtinlienhe->email=$request->input('email');
        $thongtinlienhe->diachi_id=$diachi_id ;
        $thongtinlienhe->save();

     
        
        $thongtinlienhe1 = DB::table('tbl_thongtinlienhe')
        ->select('id')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->get();

        $thongtinlienhe_id = 0;
        foreach ($thongtinlienhe1 as $item) {
           $thongtinlienhe_id = $thongtinlienhe->id;
        }



        $nguoidung = new NguoiDung();
        $nguoidung->username=$request->input('username');
        $nguoidung->password=$request->input('password');
        $nguoidung->nhom_id = 1;
        $nguoidung->thongtinlienhe_id=$thongtinlienhe_id ;


        $nguoidung->save();

        return redirect()->intended('qt-danh-sach-nguoi-dung-admin')->with('message', "Hoàn tất, Đã thêm người dùng mới");
    }
    public function chinhsuanguoidung($id)
    {
        $data_thongtinlienhe = DB::table('tbl_thongtinlienhe')
        ->select('ten', 'so_dien_thoai' , 'email', 'phuongxa_id', 'diachi_id', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho', 'so_nha', 'ten_duong')
        ->join('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->join('tbl_phuongxa', 'tbl_phuongxa.id', '=', 'tbl_diachi.phuongxa_id')
        ->join('tbl_quanhuyen', 'tbl_quanhuyen.id', 'tbl_phuongxa.quanhuyen_id')
        ->join('tbl_tinh_thanhpho', 'tbl_tinh_thanhpho.id', 'tbl_quanhuyen.tinh_thanhpho_id')
        ->where('tbl_thongtinlienhe.id', '=', $id)
        ->get();

        $thanhpho = $this::LayThanhPho();
        // return $data_thongtinlienhe;
       return view('admin.modules.nguoidung.chinhsuanguoidung',['thongtinlienhe'=>$data_thongtinlienhe,'thanhpho'=>$thanhpho]);
    }
    public function postchinhsuanguoidung(Request $request, $id)
    {
        $kiemtraphuongxa = $request->input('kiemtraphuongxa');
        $diachi_id = $request->input('diachi_id');
        $so_nha= $request->input('so_nha');
        $ten_duong= $request->input('ten_duong');
        $phuongxa= $request->input('phuongxa');
        if($kiemtraphuongxa == 1){
            $data_diachi  = DiaChi::where('id', $diachi_id)
        ->update(['so_nha'=>$so_nha, 'ten_duong'=>$ten_duong, 'phuongxa_id'=>$phuongxa]);
        }
        $ten = $request->input('ten');
        $so_dien_thoai = $request->input('so_dien_thoai');
        $email = $request->input('email');
        $tt_lienhe  = ThongTinLienHe::where('id', $id)
        ->update(['ten'=>$ten, 'so_dien_thoai'=>$so_dien_thoai, 'email'=>$email]);
         return redirect()->intended('qt-danh-sach-nguoi-dung-admin')->with('message','Hoàn tất, Đã cập nhật người dùng'.$ten.'!');
        
    }
    public function ChiTietNguoiDung($id)
    {
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
         ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_hinh_thuc_thanh_toan.id','=','tbl_donhang.hinhthucthanhtoan_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->where('tbl_nguoidung.id','=',$id)
        ->orderBy('tbl_donhang.id', 'desc')
        ->get();

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
            return redirect()->intended('qt-danh-sach-nguoi-dung-admin');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-nguoi-dung-admin');
        }
       
    }
//khuyến mãi

    public function getdanhsachkhuyenmai()
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id as chuongtrinhkhuyenmai_id','ngay_bat_dau','ngay_ket_thuc','ten_hinh_anh','ten_chuong_trinh','ti_le_giam_gia')
        ->orderBy('tbl_chuongtrinhkhuyenmai.id', 'DESC')
        ->paginate(5);
        return view('admin.modules.khuyenmai.danhsachkhuyenmai' , ['data'=>$chuongtrinhkhuyenmai]);
    }

    public function laySanPhamChoKhuyenMai($id)
    {
        $danhsachsanpham = DB::table('tbl_sanpham')
        ->join('tbl_khuyenmai_sanpham', 'tbl_khuyenmai_sanpham.sanpham_id','=','tbl_sanpham.id')
        ->join('tbl_chuongtrinhkhuyenmai', 'tbl_khuyenmai_sanpham.chuongtrinhkhuyenmai_id','=','tbl_chuongtrinhkhuyenmai.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham')
        ->where('tbl_chuongtrinhkhuyenmai.id','=',$id)
        ->get();
        return $danhsachsanpham;
    }

    public function chitietkhuyenmai($id)
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id as chuongtrinhkhuyenmai_id','ngay_bat_dau','ngay_ket_thuc','ten_hinh_anh','ten_chuong_trinh','ti_le_giam_gia', 'ten_hinh_anh')

        // ->leftJoin('tbl_quatang', 'tbl_quatang.chuongtrinhkhuyenmai_id', '=', 'tbl_quatang.id')
        ->where('tbl_chuongtrinhkhuyenmai.id','=',$id)
        ->get();

        $danhsachsanpham = DB::table('tbl_sanpham')
        ->join('tbl_khuyenmai_sanpham', 'tbl_khuyenmai_sanpham.sanpham_id','=','tbl_sanpham.id')
        ->join('tbl_chuongtrinhkhuyenmai', 'tbl_khuyenmai_sanpham.chuongtrinhkhuyenmai_id','=','tbl_chuongtrinhkhuyenmai.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham', 'mo_ta', 'tag')
        ->where('tbl_chuongtrinhkhuyenmai.id','=',$id)
        ->get();
        return view('admin.modules.khuyenmai.chitietkhuyenmai', ['data'=>$chuongtrinhkhuyenmai,'data2'=>$danhsachsanpham]);
    }
    public function themkhuyenmai()
    {
       
        $sanpham = DB::table('tbl_sanpham')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham', 'mo_ta')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('admin.modules.khuyenmai.themkhuyenmai',['data'=>$sanpham]);
    }

    public function postThemKhuyenMai(Request $request)
    {


        // echo "abc";
        $khuyenmai = new ChuongTrinhKhuyenMai();
        $khuyenmai->ten_chuong_trinh=$request->input('ten_chuong_trinh');
        $khuyenmai->ten_hinh_anh=$request->input('thangcho');
        $khuyenmai->ngay_bat_dau=$request->input('ngay_bat_dau');
        $khuyenmai->ngay_ket_thuc=$request->input('ngay_ket_thuc');
        $khuyenmai->ti_le_giam_gia=$request->input('ti_le_giam');
        
        $ngang= $request->input('ngang');
        $doc=$request->input('doc');
        if($ngang = null || $ngang < 0)
        {
            $ngang = 1366;
        }
        if($doc = null || $doc < 0)
        {
            $doc = 500;
        }
        $date = date("Y_m_d");
        $timedate = date("h_i_s");
        $time = '_'.$date.'_'.$timedate;
        $duong_dan   = public_path().'\khuyenmai\\';
        $file_anh = $request->file('thangcho');
        $hinh_anh = \Image::make($file_anh);
        $hinh_anh->resize($ngang,$doc);
        $hinh_anh->save($duong_dan.'khuyenmai'.$time.'.'.$file_anh->getClientOriginalExtension());
        $khuyenmai->ten_hinh_anh = "khuyenmai".$time.'.'.$file_anh->getClientOriginalExtension();

        $khuyenmai->save();

        $sl_khuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('id')
        ->orderBy('id','desc')
        ->first();
        $tmp1 = json_encode($sl_khuyenmai);
        $tmp =  ltrim($tmp1, '{"id":');
        // $tmp = str_replace($tmp1,'{"id":', '');
        $tmp2 = rtrim($tmp,'}');
        // return $tmp2;


        $id_sanpham = $request->input('ten_san_pham');
        // return $id_sanpham;

        // // $id_sp = explode(",",$id_sanpham);
        //     // $tag_name = explode(",", $tags);
        for($i= 0; $i < sizeof($id_sanpham); $i++){
            $sanpham_khuyenmai = new KhuyenMaiSanPham();
            $sanpham_khuyenmai->sanpham_id = $id_sanpham[$i];
            $sanpham_khuyenmai->chuongtrinhkhuyenmai_id = $tmp2;
            // echo $tmp2.",";
            $sanpham_khuyenmai->save();
            
            // echo  $id_sanpham[$i];
        }
        $tenctr = $request->input('ten_chuong_trinh');



        $mss = 'Hoàn tất, Chương trình khuyến mại '.$tenctr.' đã được thêm! ';
        return redirect()->intended('qt-danh-sach-khuyen-mai')->with('message', $mss);
       
    }

    public function chinhsuakhuyenmai($id)
    {
        $chuongtrinhkhuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
       ->select('tbl_chuongtrinhkhuyenmai.id as chuongtrinhkhuyenmai_id','ngay_bat_dau','ngay_ket_thuc','ten_hinh_anh','ten_chuong_trinh','ti_le_giam_gia', 'tbl_quatang.ten_qua_tang','so_luong')
        ->leftJoin('tbl_quatang', 'tbl_quatang.chuongtrinhkhuyenmai_id', '=', 'tbl_quatang.id')
        ->orderBy('tbl_chuongtrinhkhuyenmai.id', 'DESC')
        ->get();

        $danhsachsanphamkhuyenmai = DB::table('tbl_sanpham')
        ->join('tbl_khuyenmai_sanpham', 'tbl_khuyenmai_sanpham.sanpham_id','=','tbl_sanpham.id')
        ->join('tbl_chuongtrinhkhuyenmai', 'tbl_khuyenmai_sanpham.chuongtrinhkhuyenmai_id','=','tbl_chuongtrinhkhuyenmai.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham')
        ->where('tbl_chuongtrinhkhuyenmai.id','=',$id)
        ->get();
        $tatcasanpham = DB::table('tbl_sanpham')
        ->select('tbl_sanpham.id as id_sanpham_tatca','ten_san_pham')
        ->get();
        // return $chuongtrinhkhuyenmai;
      return view('admin.modules.khuyenmai.chinhsuakhuyenmai' ,['data'=>$chuongtrinhkhuyenmai, 'danhsachsanphamkhuyenmai'=>$danhsachsanphamkhuyenmai, 'tatcasanpham'=>$tatcasanpham]);
    }


    public function postChinhsuakhuyenmai(Request $request, $id)
    {
        DB::table('tbl_khuyenmai_sanpham')->where('chuongtrinhkhuyenmai_id', $id)->delete();
        $khuyenmai = ChuongTrinhKhuyenMai::findOrFail($id);
        $khuyenmai->ten_chuong_trinh=$request->input('ten_hinh_thuc');
        $khuyenmai->ti_le_giam_gia=$request->input('ti_le_giam_gia');
        $khuyenmai->ngay_bat_dau=$request->input('ngay_bat_dau');
        $khuyenmai->ngay_ket_thuc=$request->input('ngay_ket_thuc');
        
        if ($request->hasFile('thangcho')){
        $ngang= $request->input('ngang');
        $doc=$request->input('doc');
        if($ngang = null || $ngang < 0)
        {
            $ngang = 1366;
        }
        if($doc = null || $doc < 0)
        {
            $doc = 500;
        }
        $date = date("Y_m_d");
        $timedate = date("h_i_s");
        $time = '_'.$date.'_'.$timedate;
        $duong_dan   = public_path().'\khuyenmai\\';
        $file_anh = $request->file('thangcho');
        $hinh_anh = \Image::make($file_anh);
        $hinh_anh->resize($ngang,$doc);
        $hinh_anh->save($duong_dan.'khuyenmai'.$time.'.'.$file_anh->getClientOriginalExtension());
        $khuyenmai->ten_hinh_anh = "khuyenmai".$time.'.'.$file_anh->getClientOriginalExtension();
        }
        $khuyenmai->save();

        $sl_khuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('id')
        ->orderBy('id','desc')
        ->first();
        $tmp1 = json_encode($sl_khuyenmai);
        $tmp =  ltrim($tmp1, '{"id":');
        // $tmp = str_replace($tmp1,'{"id":', '');
        $tmp2 = rtrim($tmp,'}');
        // return $tmp2;


        $id_sanpham = $request->input('ten_san_pham');
        // return $id_sanpham;

        // // $id_sp = explode(",",$id_sanpham);
        //     // $tag_name = explode(",", $tags);
        for($i= 0; $i < sizeof($id_sanpham); $i++){
            $sanpham_khuyenmai = new KhuyenMaiSanPham();
            $sanpham_khuyenmai->sanpham_id = $id_sanpham[$i];
            $sanpham_khuyenmai->chuongtrinhkhuyenmai_id = $tmp2;
            // echo $tmp2.",";
            $sanpham_khuyenmai->save();
            
            // echo  $id_sanpham[$i];
        }
        $tenctr = $request->input('ten_hinh_thuc');
         $mss = 'Hoàn tất, Chương trình khuyến mại '.$tenctr.' đã được chỉnh sửa! ';
        return redirect()->intended('qt-danh-sach-khuyen-mai')->with('message', $mss);
    }
    

    public function xoakhuyenmai(Request $request,$id)
    {
       $khuyenmai = ChuongTrinhKhuyenMai::find($id);
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
        ->paginate(5);
       // return ($uudai) ;
        return view('admin.modules.khuyenmai.uudai',['data'=>$uudai]);
    }
    public function themuudai()
    {
        $danhsachsanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia', 'tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
       // ->leftJoin(' tbl_khuyenmai_sanpham', 'tbl_khuyenmai_sanpham.sanpham_id','=','tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham', 'mo_ta')
    
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

        $id_sanpham = $request->input('ten_san_pham');
        // return $id_sanpham;

        // // $id_sp = explode(",",$id_sanpham);
        //     // $tag_name = explode(",", $tags);
        for($i= 0; $i < sizeof($id_sanpham); $i++){
            $hinhthucuudai = new HinhThucUuDai;
            $hinhthucuudai->sanpham_id=$id_sanpham[$i];
            $hinhthucuudai->ten_hinh_thuc=$request->input('ten_hinh_thuc');
            $hinhthucuudai->uudai_id=$tmp2;
            $hinhthucuudai->save();
            // echo  $id_sanpham[$i];
        }
        $mss = 'Hoàn tất, Ưu đãi'.$request->input('ten_hinh_thuc').' đã được thêm! ';
         return redirect()->intended('qt-danh-sach-uu-dai')->with('message', $mss);

    }
    public function chinhsuauudai($id)
    {
        $uudai = DB::table('tbl_uudai')
        ->select('tbl_uudai.id','ten_hinh_thuc', 'tbl_hinhthucuudai.id as id_hinhthuc','ten_san_pham','ti_le_giam_gia','so_luong_toi_thieu', 'sanpham_id')
        ->leftJoin('tbl_hinhthucuudai','tbl_hinhthucuudai.uudai_id','=','tbl_hinhthucuudai.id')
        ->leftJoin('tbl_sanpham', 'tbl_hinhthucuudai.sanpham_id', '=', 'tbl_sanpham.id')
       ->orderBy('tbl_hinhthucuudai.id', 'DESC')
        ->get();
         $danhsachsanpham = DB::table('tbl_sanpham')
        ->leftJoin('tbl_dongia', 'tbl_dongia.sanpham_id', '=', 'tbl_sanpham.id')
       // ->leftJoin(' tbl_khuyenmai_sanpham', 'tbl_khuyenmai_sanpham.sanpham_id','=','tbl_sanpham.id')
        ->select('tbl_sanpham.id as id_sanpham','ten_san_pham', 'mo_ta')
    
        ->get();
        return view('admin.modules.khuyenmai.chinhsuauudai', ['uudai'=>$uudai, 'danhsachsanpham'=>$danhsachsanpham]);
    }
     public function postChinhSuaUuDai(Request $request,$id)
    {
        $id_hinhthuc = $request->input('id_hinhthuc');
        $uudai = UuDai::findOrFail($id);  
        
        $uudai->so_luong_toi_thieu=$request->input('so_luong_toi_thieu');
        $uudai->ti_le_giam_gia=$request->input('ti_le_giam_gia');
        $uudai->save();
        
        $hinhthuc = HinhThucUuDai::find($id_hinhthuc);
        $hinhthuc->ten_hinh_thuc=$request->input('ten_hinh_thuc');
        $hinhthuc->save();
        $mss = 'Hoàn tất, Chương trình khuyến mại '.$request->input('ten_hinh_thuc').' đã được thêm! ';
        return redirect()->intended('qt-danh-sach-uu-dai')->with($mss);
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
        ->select('tbl_quatang.id','ten_qua_tang','so_luong', 'ten_chuong_trinh')
        ->join('tbl_chuongtrinhkhuyenmai', 'tbl_chuongtrinhkhuyenmai.id', '=', 'tbl_quatang.chuongtrinhkhuyenmai_id')
        ->orderBy('id', 'desc')
        ->paginate(5);
        
        return view('admin.modules.khuyenmai.quatang', ['data'=>$quatang]);
    }
    public function themquatang()
    {
        $khuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id','ten_chuong_trinh')
        ->orderBy('ten_chuong_trinh', 'DESC')
        ->get();
        
        return view('admin.modules.khuyenmai.themquatang',['data'=>$khuyenmai]);
    }
    public function postThemQuaTang(Request $request)
    {  
        $ctr = $request->input('chuongtrinh_id');
        for($i= 0; $i < sizeof($ctr); $i++){
            $quatang = new QuaTang();
            $quatang->ten_qua_tang=$request->input('ten_qua_tang');
            $quatang->so_luong=$request->input('so_luong');
            $quatang->chuongtrinhkhuyenmai_id=$ctr[$i];
            $quatang->save();         
            // echo  $id_sanpham[$i];
        }
        $tenctr = $request->input('ten_qua_tang');



        $mss = 'Hoàn tất, Quà tặng '.$tenctr.' đã được thêm! ';
        return redirect()->intended('qt-danh-sach-qua-tang')->with('message', $mss);

        
        
    }

// ajax 
    public function LayTrangThaiDonHang($id)
    {  
       $trangthai = DB::table('tbl_donhang')
       ->join('tbl_trangthai_donhang', 'tbl_trangthai_donhang.donhang_id', '=', 'tbl_donhang.id')
       ->join('tbl_trangthai', 'tbl_trangthai.id', '=', 'tbl_trangthai_donhang.trangthai_id')
       ->where('tbl_donhang.id', '=', $id)
       ->orderBy('tbl_trangthai.ten_trang_thai', 'ASC')
       ->limit(1)
       ->get();
       return $trangthai; 
    }




    public function chinhsuaquatang($id)
    {
        $quatang = DB::table('tbl_quatang')
        ->select('tbl_quatang.id','ten_qua_tang','so_luong')
        ->orderBy('tbl_quatang.id', 'DESC')
        ->where('id', '=', $id)
        ->get();

        $khuyenmai = DB::table('tbl_chuongtrinhkhuyenmai')
        ->select('tbl_chuongtrinhkhuyenmai.id','ten_chuong_trinh')
        ->orderBy('ten_chuong_trinh', 'DESC')
        ->get();

        $khuyenmai_quatang = DB::table('tbl_quatang')
        ->join('tbl_chuongtrinhkhuyenmai', 'tbl_chuongtrinhkhuyenmai.id', '=', 'tbl_quatang.chuongtrinhkhuyenmai_id')
        ->select('tbl_chuongtrinhkhuyenmai.id', 'tbl_chuongtrinhkhuyenmai.ten_chuong_trinh')
        ->where('tbl_quatang.id', '=', $id)
        ->get();



        return view('admin.modules.khuyenmai.chinhsuaquatang',['quatang'=>$quatang,'data_khuyenmai'=>$khuyenmai, 'khuyenmai_quatang'=>$khuyenmai_quatang]);
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
        $trangthai = DB::table('tbl_trangthai')
        ->select('id','ten_trang_thai')
        ->get();
        // return $danhsachthang;
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_trangthai_donhang', 'tbl_trangthai_donhang.donhang_id', '=', 'tbl_donhang.id')
        ->leftJoin('tbl_trangthai', 'tbl_trangthai.id', '=', 'tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_donhang.id as donhang_id','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho', 'tbl_trangthai.ten_trang_thai')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('admin.modules.donhang.tatcadonhang', ['data'=>$donhang, 'trangthai'=>$trangthai]);
    }
     public function donhangdanggiao()
    {
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
         ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->where('tbl_trangthai.ten_trang_thai' , '=', 'Đang giao')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('admin.modules.donhang.danggiao', ['data'=>$donhang]);
    }
     public function donhangdangxuly()
    {
         $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
         ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->where('tbl_trangthai.ten_trang_thai' , '=', 'Đang xử lý')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('admin.modules.donhang.dangxuly', ['data'=>$donhang]);
    }



    public function getDanhSachDonHangDaGiao()
    {
        $donhang = DB::table('tbl_donhang')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
         ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        ->select('tbl_nguoidung.id as id_nguoidung','tbl_diachi.id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai')
        ->where('tbl_trangthai.ten_trang_thai' , '=', 'Đã giao')
        ->orderBy('id','desc')
        ->paginate(5);

        return view('admin.modules.donhang.dagiao', ['data'=>$donhang]);
    }
    public function chitietdonhang($id)
    {
        $trangthai = DB::table('tbl_trangthai')
        ->select('id','ten_trang_thai')
        ->get();

        $donhang = DB::table('tbl_donhang')
        ->select('tbl_nguoidung.id as id_nguoidung', 'tbl_donhang.id as donhang_id', 'tbl_diachi.id as diachi_id','ngay_dat_hang','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','tbl_trangthai.id as trangthai_id','ten_trang_thai')
        ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
        ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
        ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
         ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
        ->leftJoin('tbl_trangthai','tbl_trangthai.id','=','tbl_trangthai_donhang.trangthai_id')
        ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
        ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
        ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
        ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
        
        ->orderBy('tbl_trangthai.id', 'DESC')
        ->where('tbl_donhang.id' , '=', $id)
        ->get();

        $sanpham = DB::table('tbl_sanpham')
        ->join('tbl_chitietdonhang', 'tbl_chitietdonhang.sanpham_id', '=', 'tbl_sanpham.id')
        ->where('tbl_chitietdonhang.donhang_id', '=', $id)
        ->select('tbl_chitietdonhang.id', 'ten_san_pham', 'tbl_chitietdonhang.so_luong','don_gia','thanh_tien')
        ->get();
        // return $sanpham;

        return view('admin.modules.donhang.chitietdonhang',['data'=>$donhang, 'sanpham'=>$sanpham,'trangthai'=>$trangthai]);
    }
    public function chitietdonhangdangxuly()
    {
        return view('admin.modules.donhang.chitietdangxuly');
    }
    public function chitietdonhangdagiao()
    {
        return view('admin.modules.donhang.chitietdagiao');
    }
    public function chitietdonhangdanggiao()
    {
        return view('admin.modules.donhang.chitietdanggiao');
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
       ->orderBy('id','desc')
        ->paginate(5);
       // return $donhang;
         return view('admin.modules.baocao.baocao', ['data'=>$donhang]);
    }



//HAM SAP XEP
    public function getSapXepTongHop($thang, $trangthai)
    {

        if($thang == 0){
            $donhang = DB::table('tbl_donhang')
            ->select('tbl_nguoidung.id as id_nguoidung','tbl_donhang.id as donhang_id','tbl_diachi.id','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai',
                DB::raw('DATE_FORMAT(ngay_dat_hang, "%d-%m-%Y") as ngay_dat_hang'))
            
            ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
             ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
            ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
            ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
            ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
            ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
            ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
            ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
            ->join('tbl_trangthai', 'tbl_trangthai_donhang.trangthai_id', '=', 'tbl_trangthai.id')
            ->where('tbl_trangthai.id', '=', $trangthai)
            ->get();
            // ->paginate(5);
        }
        else if($trangthai == 0)
        {
            $donhang = DB::table('tbl_donhang')
            ->select('tbl_nguoidung.id as id_nguoidung','tbl_donhang.id as donhang_id','tbl_diachi.id','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai',
                DB::raw('DATE_FORMAT(ngay_dat_hang, "%d-%m-%Y") as ngay_dat_hang'))
            
            ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
             ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
            ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
            ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
            ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
            ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
            ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
            ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
            ->join('tbl_trangthai', 'tbl_trangthai_donhang.trangthai_id', '=', 'tbl_trangthai.id')
            ->whereMonth('ngay_dat_hang', '=', $thang)->get();
            // ->paginate(5);
        }
        else{
            $donhang = DB::table('tbl_donhang')
            ->select('tbl_nguoidung.id as id_nguoidung','tbl_donhang.id as donhang_id','tbl_diachi.id','phi_van_chuyen','tong_tien','ten_nguoi_nhan','tbl_hinh_thuc_thanh_toan.ten_hinh_thuc', 'tbl_thongtinlienhe.so_dien_thoai', 'email', 'so_nha', 'ten_duong', 'ten_phuong_xa', 'ten_quan_huyen', 'ten_tinh_thanhpho','ten_trang_thai',
                DB::raw('DATE_FORMAT(ngay_dat_hang, "%d-%m-%Y") as ngay_dat_hang'))
            
            ->leftJoin('tbl_trangthai_donhang','tbl_donhang.id','=','tbl_trangthai_donhang.donhang_id')
             ->leftJoin('tbl_hinh_thuc_thanh_toan','tbl_donhang.hinhthucthanhtoan_id', '=', 'tbl_hinh_thuc_thanh_toan.id')
            ->leftJoin('tbl_nguoidung','tbl_donhang.nguoidung_id', '=', 'tbl_nguoidung.id')
            ->leftJoin('tbl_thongtinlienhe','tbl_nguoidung.thongtinlienhe_id', '=', 'tbl_thongtinlienhe.id')
            ->leftJoin('tbl_diachi', 'tbl_diachi.id', '=', 'tbl_thongtinlienhe.diachi_id')
            ->leftJoin('tbl_phuongxa', 'tbl_diachi.phuongxa_id', '=', 'tbl_phuongxa.id')
            ->leftJoin('tbl_quanhuyen', 'tbl_phuongxa.quanhuyen_id', '=', 'tbl_quanhuyen.id')
            ->leftJoin('tbl_tinh_thanhpho', 'tbl_quanhuyen.tinh_thanhpho_id', '=', 'tbl_tinh_thanhpho.id')
            ->join('tbl_trangthai', 'tbl_trangthai_donhang.trangthai_id', '=', 'tbl_trangthai.id')
            ->whereMonth('ngay_dat_hang', '=', $thang)
            ->where('tbl_trangthai.id', '=', $trangthai)->get();
            // ->paginate(5);
        }

        return $donhang;
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
     public function getBaoCaoTheoBieuDo()
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
        return view('admin.modules.baocao.baocaodangluoi', ['data'=>$donhang]);
    }

//tágs
    public function danhsachtags()
    {
        $tags = DB::table('tbl_tags')
        ->select('tbl_tags.id','ten_tags')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('admin.modules.tags.danhsachtags', ['data'=>$tags]);
    }
    public function themtags()
    {
        $sanpham = DB::table('tbl_sanpham')
        ->select('id', 'ten_san_pham')
        ->get();
       return view('admin.modules.tags.themtags', ['data_sp'=>$sanpham]);
    }
    public function postThemTags(ThemTagsRequest $request)
    {
        $tags = new Tags();
        $tags->ten_tags=$request->input('ten_tags');
        $tags->sanpham_id=$request->input('sanpham_id');
        $tags->save();
        return redirect('/qt-them-tags')->with('message', "Hoàn tất, Đã thêm tags mới");
    }
    public function chinhsuatags($id)

    {
         $tags = DB::table('tbl_tags')
        ->select('tbl_tags.id','ten_tags')
        ->orderBy('id', 'desc')

        ->paginate(10);
         $sanpham = DB::table('tbl_sanpham')
        ->select('id', 'ten_san_pham')
        ->get();
      
         return view('admin.modules.tags.chinhsuatags', ['data'=>$tags ,'data_sp'=>$sanpham]);
    }
    public function postChinhSuaTags(Request $request, $id)
    {
        $tags = Tags::findOrFail($id);
        $tags->ten_tags=$request->input('ten_tags');
        $tags->sanpham_id=$request->input('sanpham_id');
        $tags->save();
        return redirect('/qt-danh-sach-tags');
    }
    public function xoatags(Request $request,$id)
    {
       $tags = Tags::find($id);
        if($tags->delete())
        {
            return redirect()->intended('qt-danh-sach-tags');    
        }
        else{
             return  redirect()->intended('qt-danh-sach-tags');
        }
       
    }


    public function XoaAnhSanPham($id)
    {
        $id_sanpham = DB::table('tbl_hinhanh')
        ->select('sanpham_id')
        ->where('id','=', $id)
        ->get();
        $idsp = "";
        foreach ($id_sanpham as $value) {
            $idsp = $value->sanpham_id;
        }

        $hinhanhsp = HinhAnh::find($id);
        $hinhanhsp->delete();
        return redirect()->intended('qt-chinh-sua-san-pham/'.$idsp);
    }
    


    public function LayThanhPho()
    {
        $thanhpho = DB::table('tbl_tinh_thanhpho')
        ->select('id', 'ten_tinh_thanhpho')
        ->get();
        return $thanhpho;
    }
    public function LayQuanHuyen($id)
    {
        $quanhuyen = DB::table('tbl_quanhuyen')
        ->select('id', 'ten_quan_huyen')
        ->where('tinh_thanhpho_id', $id)
        ->get();
        return $quanhuyen;
    }
    public function LayPhuongXa($id)
    {
        $phuongxa = DB::table('tbl_phuongxa')
        ->select('id', 'ten_phuong_xa')
        ->where('quanhuyen_id', $id)
        ->get();
        return $phuongxa;
    }


}
