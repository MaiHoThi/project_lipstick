<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Middleware
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
        if(!Auth::check()){
            echo "Chưa đăng nhập vào trang web";
            return redirect('home');
        }else{
            $user = Auth::user();
    
            if($user->role!='user'){
                return redirect("home");
            }
        }
        return $next($request);
    }
}
