<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * dang nhap
     */

    public function login_nguoi_dung(Request $request)
    {
        $user = \DB::table('tbl_nguoidung')->where('username',$request->username)->where('password',($request->password))
            ->first();

        if ($user)
        {
            $request->session()->put('user',$user);
            return redirect('/')->with('success',' Đăng nhập thành công ');
        }

        return redirect()->back()->withInput($request->only('username','password'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * dang xuat
     */

    public function dangxuat()
    {
        \Session::forget('user');
        return redirect()->back();
    }
}
