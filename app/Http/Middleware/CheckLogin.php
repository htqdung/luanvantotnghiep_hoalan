<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


if(Session::has('login')){

            $arr = [

                'username'=>Session::get('login')->username,

                'password'=>Session::get('login')->password,

            ];

            if(DB::table('vietpro_users')->where($arr)->count()==1){

                return redirect()->intended('admin.modules.dangnhapadmin.dangnhap');

            }

            else{

                return $next($request);

            }

        }

        else{

            return $next($request);

        }

        return $next($request);
    }
}
