<?php
include_once('qd_web.php');
include_once('route_frontend.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function(){
	return view('trangchinh.trangchu.test');
});

Route::group(['prefix'=>'trangchinh'],function(){

	Route::group(['prefix'=>'trangchu'],function(){
		Route::get('trangchu', 'trangchinhController@trangchu');
	});

	Route::group(['prefix'=>'gioithieu'],function(){
		Route::get('gioithieu', 'trangchinhController@gioithieu');
	});

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('sanpham', 'trangchinhController@sanpham');
	});

	Route::group(['prefix'=>'chitietsanpham'],function(){

		Route::get('chitietsanpham', 'trangchinhController@chitietsanpham');
	});

	Route::group(['prefix'=>'lienhe'],function(){
		Route::get('lienhe', 'trangchinhController@lienhe');
	});

	Route::group(['prefix'=>'giohang'],function(){
		Route::get('giohang', 'trangchinhController@giohang');
	});

	Route::group(['prefix'=>'khuyenmai'], function ()
	{
		Route::get('khuyenmai', 'trangchinhController@khuyenmai');
	});

	Route::group(['prefix'=>'dathang'],function(){
		Route::get('dathang1', 'trangchinhController@dathang1');
		
		Route::get('dathang2', 'trangchinhController@dathang2');

		Route::get('dathang3', 'trangchinhController@dathang3');

		Route::get('dathang4', 'trangchinhController@dathang4');
	});
});