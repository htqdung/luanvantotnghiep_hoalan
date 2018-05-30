  <?php
Route::get('tsst', 'adminController@DoanhThuBanHang12Thang');
Route::get('qt-admin', 'adminController@getTest')->name('MO_GIAO_DIEN_ADMIN');
//danh mục loài hoa
Route::get('qt-danh-muc-hoa', 'adminController@getdanhmuchoa')->name('DANH_MUC_HOA');
Route::get('qt-chinh-sua-loai-hoa/{id}', 'adminController@getChinhSuaHoa')->name('CHINH_SUA_HOA');
Route::post('qt-chinh-sua-loai-hoa/{id}', 'adminController@postChinhSuaLoaiHoa');
Route::get('qt-xoa-loai-hoa/{id}', 'adminController@xoaloaihoa')->name('XOA_LOAI_HOA');

Route::get('qt-them-danh-muc-hoa','adminController@themdanhmuchoa')->name('THEM_DANH_MUC_HOA');
Route::post('qt-them-danh-muc-hoa', 'adminController@postThemLoaiHoa');

Route::get('qt-chi-tiet-loai-hoa/{id}', 'adminController@chitietloaihoa')->name('CHI_TIET_LOAI_HOA');
//sản phẩm
Route::get('qt-danh-sach-san-pham', 'adminController@getdachsachsanpham')->name('DANH_SACH_SAN_PHAM');
Route::get('qt-them-san-pham','adminController@themsanpham')->name('THEM_SAN_PHAM');
Route::post('qt-them-san-pham','adminController@postThemSanPham');

Route::post('qt-chinh-sua-san-pham/{id}','adminController@postChinhSuaSanPham');
Route::get('qt-chinh-sua-san-pham/{id}','adminController@chinhsuasanpham')->name('CHINH_SUA_SAN_PHAM');
Route::get('qt-chi-tiet-san-pham/{id}','adminController@chitietsanpham')->name('CHI_TIET_SAN_PHAM');
Route::get('qt-xoa-san-pham/{id}','adminController@xoasanpham')->name('XOA_SAN_PHAM');

//đặc điểm
Route::get('qt-dac-diem-hoa', 'adminController@getdacdiemhoa')->name('DAC_DIEM_HOA');
Route::get('qt-chinh-sua-dac-diem/{id}', 'adminController@chinhsuadacdiem')->name('CHINH_SUA_DAC_DIEM');
Route::post('qt-chinh-sua-dac-diem/{id}', 'adminController@postChinhSuaDacDiem');
Route::get('qt-xoa-dac-diem/{id}', 'adminController@xoadacdiem')->name('XOA_DAC_DIEM');


Route::get('qt-them-dac-diem','adminController@themdacdiem')->name('THEM_DAC_DIEM');
Route::post('qt-them-dac-diem','adminController@postThemDacDiem');

//chi
Route::get('qt-chi', 'adminController@getchi')->name('DANH_SACH_CHi');
Route::get('qt-them-chi', 'adminController@themchi')->name('THEM_CHI');
Route::post('qt-them-chi', 'adminController@postThemChi');
Route::get('qt-chinh-sua-chi/{id}', 'adminController@chinhsuachi')->name('CHINH_SUA_CHI');
Route::post('qt-chinh-sua-chi/{id}', 'adminController@postChinhSuaChi');
Route::get('qt-xoa-chi/{id}', 'adminController@xoachi')->name('XOA_CHI');
Route::get('qt-chi-tiet-chi/{id}','adminController@chitietchi')->name('CHI_TIET_CHI');


//người dùng
Route::get('qt-danh-sach-nguoi-dung', 'adminController@getnguoidung')->name('DANH_SACH_NGUOI_DUNG');
Route::get('qt-danh-sach-nguoi-dung-admin', 'adminController@getnguoidungadmin')->name('DANH_SACH_NGUOI_DUNG_ADMIN');
Route::get('them-nguoi-dung', 'adminController@themnguoidung')->name('THEM_NGUOI_DUNG');
Route::get('chinh-sua-nguoi-dung/{id}', 'adminController@chinhsuanguoidung')->name('CHINH_SUA_NGUOI_DUNG');
Route::get('qt-chi-tiet-nguoi-dung/{id}', 'adminController@ChiTietNguoiDung')->name('CHI_TIET_NGUOI_DUNG');
Route::get('qt-xoa-nguoi-dung/{id}', 'adminController@xoanguoidung')->name('XOA_NGUOI_DUNG');
//khuyến mãi
Route::get('qt-danh-sach-khuyen-mai', 'adminController@getdanhsachkhuyenmai')->name('DANH_SACH_KHUYEN_MAI');

Route::get('qt-chi-tiet-khuyen-mai/{id}','adminController@chitietkhuyenmai')->name('CHI_TIET_KHUYEN_MAI');

Route::get('qt-them-khuyen-mai','adminController@themkhuyenmai')->name('THEM_KHUYEN_MAI');
Route::post('qt-them-khuyen-mai','adminController@postThemKhuyenMai');

Route::get('qt-chinh-sua-hinh-thuc-khuyen-mai/{id}','adminController@chinhsuakhuyenmai')->name('CHINH_SUA_KHUYEN_MAI');
Route::post('qt-chinh-sua-hinh-thuc-khuyen-mai/{id}','adminController@postChinhsuakhuyenmai');

Route::get('qt-xoa-khuyen-mai/{id}','adminController@xoakhuyenmai')->name('XOA_KHUYEN_MAI');
//ưu đãi
Route::get('qt-danh-sach-uu-dai','adminController@danhsachuudai')->name('DANH_SACH_UU_DAI');
Route::get('qt-them-uu-dai','adminController@themuudai')->name('THEM_UU_DAI');
Route::post('qt-them-uu-dai','adminController@postThemUuDai');
Route::get('qt-chinh-sua-uu-dai/{id}','adminController@chinhsuauudai')->name('CHINH_SUA_UU_DAI');
Route::post('qt-chinh-sua-uu-dai/{id}','adminController@postChinhSuaUuDai');
Route::get('qt-xoa-uu-dai/{id}','adminController@xoauudai')->name('XOA_UU_DAI');
//quà tặng
Route::get('qt-danh-sach-qua-tang','adminController@danhsachquatang')->name('DANH_SACH_QUA_TANG');
Route::get('qt-them-qua-tang','adminController@themquatang')->name('THEM_QUA_TANG');
Route::post('qt-them-qua-tang','adminController@postThemQuaTang');
Route::get('qt-chinh-sua-qua-tang/{id}','adminController@chinhsuaquatang')->name('CHINH_SUA_QUA_TANG');
Route::post('qt-chinh-sua-qua-tang/{id}','adminController@postChinhsuaquatang');

Route::get('qt-xoa-qua-tang/{id}','adminController@xoaquatang')->name('XOA_QUA_TANG');

//đơn hàng
Route::get('qt-tat-ca-don-hang','adminController@tatcadonhang')->name('TAT_CA_DON_HANG');

Route::get('qt-don-hang-da-giao','adminController@getDanhSachDonHangDaGiao')->name('DON_HANG_DA_GIAO');
Route::get('qt-don-hang-dang-giao','adminController@donhangdanggiao')->name('DON_HANG_DANG_GIAO');
Route::get('qt-don-hang-dang-xu-ly','adminController@donhangdangxuly')->name('DON_HANG_DANG_XU_LY');

//báo cáo
Route::get('qt-bao-cao-tong','adminController@getBaoCaoTong')->name('DANH_SACH_TONG');
Route::get('qt-bao-cao-thang-1','adminController@getBaoCaoTheoThangMot')->name('DANH_SACH_THANG_MOT');
Route::get('qt-bao-cao-thang-2','adminController@getBaoCaoTheoThangHai')->name('DANH_SACH_THANG_HAI');
Route::get('qt-bao-cao-thang-3','adminController@getBaoCaoTheoThangBa')->name('DANH_SACH_THANG_BA');
Route::get('qt-bao-cao-thang-4','adminController@getBaoCaoTheoThangTu')->name('DANH_SACH_THANG_TU');
Route::get('qt-bao-cao-thang-5','adminController@getBaoCaoTheoThangNam')->name('DANH_SACH_THANG_NAM');
Route::get('qt-bao-cao-thang-6','adminController@getBaoCaoTheoThangSau')->name('DANH_SACH_THANG_SAU');
Route::get('qt-bao-cao-thang-7','adminController@getBaoCaoTheoThangBay')->name('DANH_SACH_THANG_BAY');
Route::get('qt-bao-cao-thang-8','adminController@getBaoCaoTheoThangTam')->name('DANH_SACH_THANG_TAM');
Route::get('qt-bao-cao-thang-9','adminController@getBaoCaoTheoThangChin')->name('DANH_SACH_THANG_CHIN');
Route::get('qt-bao-cao-thang-10','adminController@getBaoCaoTheoThangMuoi')->name('DANH_SACH_THANG_MUOI');
Route::get('qt-bao-cao-thang-11','adminController@getBaoCaoTheoThangMuoiMot')->name('DANH_SACH_THANG_MUOI_MOT');
Route::get('qt-bao-cao-thang-12','adminController@getBaoCaoTheoThangMuoiHai')->name('DANH_SACH_THANG_MUOI_HAI');
Route::get('qt-bao-cao-bieu-do','adminController@getBaoCaoTheoBieuDo')->name('DANH_SACH_BIEU_DO');
//tags
Route::get('qt-danh-sach-tags','adminController@danhsachtags')->name('DANH_SACH_TAGS');
Route::get('qt-them-tags', 'adminController@themtags')->name('THEM_TAGS');
Route::post('qt-them-tags', 'adminController@postThemTags');
Route::get('qt-chinh-sua-tags/{id}', 'adminController@chinhsuatags')->name('CHINH_SUA_TAGS');
Route::post('qt-chinh-sua-tags/{id}', 'adminController@postChinhSuaTags');
Route::get('qt-xoa-tags/{id}', 'adminController@xoatags')->name('XOA_TAGS');
// Route::get('/reporting', ['uses' =>'ReportController@index', 'as' => 'Report']);
// Route::post('/reporting', ['uses' =>'ReportController@post']);
// 
Route::get('qt-xoa-lien-he/{id}', 'adminController@XoaLienHe')->name('XOA_LIEN_HE');



//ajax
Route::get('ajax-lay-danh-mua-loai-hoa/{id}', 'adminController@layDanhMucLoaiHoa');
Route::get('ajax-lay-danh-sach-san-pham/{id}', 'adminController@laySanPhamChoKhuyenMai');



?>