<?php

Route::get('admin', 'adminController@getTest');

Route::get('danh-muc-hoa', 'adminController@getdanhmuchoa');

Route::get('danh-sach-san-pham', 'adminController@getdachsachsanpham');

Route::get('dac-diem-hoa', 'adminController@getdacdiemhoa');

Route::get('chi', 'adminController@getchi');

?>