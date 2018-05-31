<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if(Session::has('login'))
        {

                    $arr = [

                        'username'=>Session::get('login')->username,

                        'password'=>Session::get('login')->password,

                    ];

                    if(DB::table('tbl_nguoidung')->where($arr)->count()==1)
                    {

                        return $next($request);

                    }

                    else{

                        return redirect()->intended('login');

                    }
        }
                
                else{

                    return redirect()->intended('login');

                }

                return $next($request);
            
}
