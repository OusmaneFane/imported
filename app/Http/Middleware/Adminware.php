<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Adminware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
     //  $userTpe = DB::table('utilisateurs')->where('user_type', 'Administrator')->get();
      $userInfo = DB::table('utilisateurs')
      ->where('id', $request->session()->get('PasseUser'))
      ->first();
        // dd($userInfo->user_type == 'Administrator');
        if($userInfo->user_type == 'Administrator'){
            return $next($request);
            }
            else {
                 abort(401);
            }
        if($request->url('/') == $request->url() ){
                abort(401);
            }
            
    }
}
