<?php

Route::get('admin', 'adminController@getTest')->name('MO_GIAO_DIEN_ADMIN');
//danh mục hoa
Route::get('qt-danh-muc-hoa', 'adminController@getdanhmuchoa')->name('DANH_MUC_HOA');
Route::get('qt-chinh-sua-loai-hoa/{id}', 'adminController@getChinhSuaHoa')->name('CHINH_SUA_HOA');


//sản phẩm
Route::get('qt-danh-sach-san-pham', 'adminController@getdachsachsanpham');
//đặc điểm
Route::get('qt-dac-diem-hoa', 'adminController@getdacdiemhoa');
Route::get('qt-chinh-sua-dac-diem/{id}', 'adminController@chinhsuadacdiem')->name('CHINH_SUA_DAC_DIEM');
Route::get('qt-them-dac-diem','adminController@themdacdiem')->name('THEM_DAC_DIEM');

//chi
Route::get('qt-chi', 'adminController@getchi')->name('DANH_SACH_CHi');
Route::get('qt-them-chi', 'adminController@themchi')->name('THEM_CHI');
Route::get('qt-chinh-sua-chi', 'adminController@chinhsuachi')->name('CHINH_SUA_CHI');

//người dùng
Route::get('qt-danh-sach-nguoi-dung', 'adminController@getnguoidung')->name('DANH_SACH_NGUOI_DUNG');
Route::get('them-nguoi-dung', 'adminController@themnguoidung')->name('THEM_NGUOI_DUNG');
Route::get('chinh-sua-nguoi-dung', 'adminController@chinhsuanguoidung')->name('CHINH_SUA_NGUOI_DUNG');


//khuyến mãi
Route::get('danh-sach-khuyen-mai', 'adminController@getdanhsachkhuyenmai')->name('DANH_SACH_KHUYEN_MAI');
Route::get('qt-chi-tiet-khuyen-mai/{id}','adminController@chitietkhuyenmai')->name('CHI_TIET_KHUYEN_MAI');
//ưu đãi
Route::get('qt-danh-sach-uu-dai','adminController@danhsachuudai')->name('DANH_SACH_UU_DAI');
//quà tặng
Route::get('qt-danh-sach-qua-tang','adminController@danhsachquatang')->name('DANH_SACH_QUA_TANG');

//đơn hàng
Route::get('qt-tat-ca-don-hang','adminController@tatcadonhang')->name('TAT_CA_DON_HANG');
Route::get('qt-don-hang-dang-giao','adminController@donhangdanggiao')->name('DON_HANG_DANG_GIAO');
Route::get('qt-don-hang-dang-xu-ly','adminController@donhangdangxuly')->name('DON_HANG_DANG_XU_LY');
?>