<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // $utilisateur = Utilisateur::where('user_type', '=', 'Administrator');

        // if (Auth ::utilisateur()->user_type == 'Administrator'){ 
         return $next($request); 
        //   } else { 
        //     return redirect('/admins/dashboard'); 
        //   } 
    }
}