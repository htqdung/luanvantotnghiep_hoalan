<?php


Route::post('/dang-ky','Auth\RegisterController@create')->name('dangky');
Route::post('/dang-nhap','Auth\LoginController@login_nguoi_dung')->name('login_nguoidung');

Route::get('/','Frontend\HomeController@index')->name('frontend.index');
Route::get('/gioi-thieu.html','Frontend\FrontendController@about')->name('frontend.about');

// gui lien he
Route::get('/lien-he.html','Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he.htnl','Frontend\FrontendController@saveContact')->name('frontend.save.contact');

Route::get('/khuyen-mai.html','Frontend\FrontendController@sale')->name('frontend.sale');
Route::get('/san-pham.html','Frontend\FrontendController@listproduct')->name('frontend.listproduct');
Route::get('/chi-tiet/{slug?}-{id?}.html','Frontend\FrontendController@detailProduct')->name('frontend.chitiet');
Route::group(['prefix' => 'gio-hang','namespace' => 'Frontend'],function(){
    Route::get('/add/{id}','ShoppingCartController@add')->name('cart.add');
    Route::get('/','ShoppingCartController@index')->name('cart.index');
    Route::post('/','ShoppingCartController@updateCart')->name('update.cart.index');
    Route::get('/delete/{id}','ShoppingCartController@delete')->name('delete.item.cart');

    Route::get('/thanh-toan.html','ShoppingCartController@pay')->name('pay');
});

Route::get('/dang-xuat','Auth\LoginController@dangxuat')->name('dang-xuat');