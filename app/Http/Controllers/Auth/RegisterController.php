<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'             => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:users',
            'password'         => 'required|string|min:6|confirmed',
            'confirm_password' => 'required|same:password'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        try{
            $id_info = \DB::table('tbl_thongtinlienhe')->insertGetId([
                'ten'           => $request->ten,
                'so_dien_thoai' => $request->so_dien_thoai,
                'email'         => $request->email,
                'diachi_id'     => 6
            ]);
        }catch (\Exception $e)
        {
            $id_info = '';
        }

        if ($id_info)
        {
            try{
                $id_nguoidung = \DB::table('tbl_nguoidung')->insertGetId([
                    'username'          => $request->username,
                    'password'          => ($request->password),
                    'nhom_id'           => 2,
                    'thongtinlienhe_id' => $id_info,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now()
                ]);

            }catch (\Exception $e)
            {
                $id_nguoidung = '';
            }
            if ($id_nguoidung) return redirect()->route('showLogin')->with('success','Đăng ký thành công ');
            return redirect()->back()->with('danger','Đăng ký thất bại ');

        }

        return redirect()->back()->with('danger','Đăng ký thất bại ');
    }
}
