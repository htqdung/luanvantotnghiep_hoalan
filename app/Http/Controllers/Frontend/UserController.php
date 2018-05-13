<?php

namespace App\Http\Controllers\Frontend;

use App\NguoiDung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public  $user;

    public function index()
    {
        $users = NguoiDung::with([
            'tbl_thongtinlienhe' => function($q)
            {
                $q->select('*');
            }
        ])->where("id",\Session::get('user')->id)->first();

        $address = \DB::table('tbl_diachi')->get();
        return view('trangchinh.info.index',compact('address','users'));
    }
}
