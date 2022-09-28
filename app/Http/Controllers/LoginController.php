<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;


class LoginController extends Controller
{
    public function exportUsers()
    {
        return view('posts.exporte');
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

        $utilisateur = new Utilisateur;
        $utilisateur->name = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->password = Hash::make($request->password);
        $utilisateur->password_confirm = Hash::make($request->password_confirm);
        $query = $utilisateur->save();

        if($query){
            return back()->with('success', 'Inscription réussi avec succès');
        }else {
            return back()->with('fail', 'Quelque chose s\'est aml passée');
        }

     }
    public function check(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);


        $userInfo = Utilisateur::where('name','=', $request->name)->first();
        if($userInfo){
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('PasseUser', $userInfo->id);
                return redirect('/users');
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
            return redirect('posts/exporte');
        }else{
            return('Pas de session');
        }
    }
}
 //     return back()->with('fail', 'Vous n\'êtes pas reconnu' );
        // }else{
        //     if(!$userInfop){
        //         return back()->with('fail', 'mtd incorrect');

        //     }else{
        //         $request->session()->put('passe', $userInfo->id);
        //         return view('/home');
        //     }
        // }
