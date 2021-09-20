<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::find(Auth::id());
        if($user){
            if($user->roles->count()){
                return $next($request);
            }else{
                return redirect()->route('client.home.index');
            }
        }else{
            return redirect()->route('client.home.index');
        }
       
    }
}
