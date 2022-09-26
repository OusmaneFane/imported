<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function exportUsers()
    {
        return view('posts.exporte');
    }
    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $results = auth()->attempt([
            'email' => request('email'),
            'password' =>request('password'),
        ]);
        var_dump($results);
        return ('traitement de données');
    }
}
