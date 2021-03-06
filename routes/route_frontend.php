<?php

Route::get('taikhoan/dang-ky','Frontend\FrontendController@showRegiter')->name('showRegiter');
Route::post('/dang-ky','Auth\RegisterController@create')->name('dangky');

Route::get('taikhoan/dang-nhap','Frontend\FrontendController@showLogin')->name('showLogin');
Route::post('/dang-nhap','Auth\LoginController@login_nguoi_dung')->name('login_nguoidung');

Route::get('/','Frontend\HomeController@index')->name('frontend.index');
Route::get('/gioi-thieu.html','Frontend\FrontendController@about')->name('frontend.about');

/** user **/
Route::group(['prefix' => 'info' , 'namespace' => 'Frontend'], function(){
    Route::get('/','UserController@index')->name('infoUser');
});
/** user **/

// gui lien he
Route::get('/lien-he.html','Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he.html','Frontend\FrontendController@saveContact')->name('frontend.save.contact');

Route::get('/loai/{slug?}-{id?}.html','Frontend\FrontendController@loaiSp')->name('loaisp');

Route::get('/khuyen-mai.html','Frontend\FrontendController@khuyenmai')->name('frontend.khuyenmai');
Route::get('/qua-tang.html','Frontend\FrontendController@quatang')->name('frontend.quatang');
Route::get('/san-pham.html','Frontend\FrontendController@listproduct')->name('frontend.listproduct');
Route::get('/chi-tiet/{slug?}-{id?}.html','Frontend\FrontendController@detailProduct')->name('frontend.chitiet');
Route::group(['prefix' => 'gio-hang','namespace' => 'Frontend'],function(){
    Route::get('/add/{id}','ShoppingCartController@add')->name('cart.add');
    Route::get('/','ShoppingCartController@index')->name('cart.index');
    Route::post('/','ShoppingCartController@updateCart')->name('update.cart.index');
    Route::get('/delete/{id}','ShoppingCartController@delete')->name('delete.item.cart');

    Route::get('/thanh-toan.html','ShoppingCartController@pay')->name('pay');
    Route::post('/thanh-toan','ShoppingCartController@postPay')->name('postPay');

    Route::get('/delete_ajax/{id}','ShoppingCartController@deleteItemProduct');
    Route::get('/update_ajax/{id}/{qty}','ShoppingCartController@updateItemProduct');
});

Route::post('/get_city/{id}','Frontend\FrontendController@getCity');
Route::post('/get_district/{id}','Frontend\FrontendController@getDistrict');
Route::post('/get_wards/{id}','Frontend\FrontendController@getWards');

Route::get('/don-hang.html','Frontend\FrontendController@donhang')->name('frontend.donhang');
Route::get('/chi-tiet-don-hang.html','Frontend\FrontendController@chitietdonhang')->name('frontend.chitietdonhang');

// tim kiem typehead
Route::get('/tim-kiem','Frontend\FrontendController@searchTypehead')->name('searchTypehead');


Route::get('/dang-xuat','Auth\LoginController@dangxuat')->name('dang-xuat');


Route::post('/guiemail','Frontend\FrontendController@sendEmail')->name('send_email');