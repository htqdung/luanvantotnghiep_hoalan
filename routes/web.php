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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
