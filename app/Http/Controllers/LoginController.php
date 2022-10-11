<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


class LoginController extends Controller
{
    public function administrator(Request $request)
    {
        $done = DB::table('utilisateurs')->get();
        $users = DB::table('users')->get();
        return view('admins/dashboard', ['users'=>$users, 'utilisateurs'=>$done]);
    }

    public function exportUsers(Request $request)
    {
        if($request->session()->has('PasseUser')){
            return  redirect()->back();
        }
        return view('posts.login');
    }

    public function inscription()
    {
        return view('posts.inscrit');
    }
    public function trait(Request $request)
     {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'password_confirm' => ['required'],

        ]);

         $query = DB::table('utilisateurs')
                ->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'password_confirm' => Hash::make($request->password_confirm)
                ]);

        if($query){
            return back()->with('success', 'Inscription réussi avec succès');
        }else {
            return back()->with('fail', 'Quelque chose s\'est mal passée');
        }

     }
    public function check(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $userInfo = DB::table('utilisateurs')
                  ->where('name', $request->name )
                  ->first();


        if($userInfo){
            if(Hash::check($request->password, $userInfo->password) ){
                $request->session()->put('PasseUser', $userInfo->id);
                if($userInfo->user_type== 'Administrator'){
                  
                    return redirect('/admins/dashboard');
                }
                else{
                    return redirect('/users');
                }

            }else{
                return back()->with('fail', 'Mot de passe Incorrect');
            }
        }else{
                return back()->with('fail', 'Aucun compte ne correspond à cet email');
        }

    }

    public function logout()
    {
        if(session()->has('PasseUser')){
            session()->pull('PasseUser');
            return redirect('posts/login');
        }else{
            return redirect('posts/login');
        }
    }
}

