<?php
include_once('qd_web.php');
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
include_once 'route_frontend.php';
//
//Route::get('/',function(){
//	return view('trangchinh.trangchu.trangchu');
//});
//Route::get('test', function(){
//	return view('trangchinh.trangchu.test');
//});
//
//Route::group(['prefix'=>'trangchinh'],function(){
//
//
//
//	Route::group(['prefix'=>'sanpham'],function(){
//		Route::get('sanpham', 'trangchinhController@getsanpham');
//	});
//
//	Route::group(['prefix'=>'chitietsanpham'],function(){
//
//		Route::get('chitietsanpham', 'trangchinhController@chitietsanpham');
//	});
//
//
//
//
//
//
//
//	Route::group(['prefix'=>'dathang'],function(){
//		Route::get('dathang1', 'trangchinhController@dathang1');
//
//		Route::get('dathang2', 'trangchinhController@dathang2');
//
//		Route::get('dathang3', 'trangchinhController@dathang3');
//
//		Route::get('dathang4', 'trangchinhController@dathang4');
//	});
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
