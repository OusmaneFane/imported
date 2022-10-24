<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\Post;

use App\Models\User;
use App\Models\Depart;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


class LoginController extends Controller
{

public function envoi(Request $request){
    request()->validate([
        'email'=> 'required',
        'message' => 'required',
        'subject' => 'required',
    ]);

    $email_data = [
        'recipient' => 'dev@malicreances.com',
        'fromEmail' => $request->email,
        'subject' =>$request->subject,
        'body' => $request->message,
    ];
    Mail::send('email-template', $email_data, function($message) use ($email_data){
        $message->to($email_data['recipient'])
                ->from($email_data['fromEmail'])
                ->subject($email_data['subject']);
    });
}

    public function administrator( Request $request)
    {
        $departs = Depart::all();
      $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);

        $users = User::where('no', '!=', null);
        if( $request->has('filtre'))
        {
            if($request->query('filtre') == 'absence'){

                $users->where('absent', 'True');

            }
            else if($request->query('filtre') == 'retard'){
                $users->where('late', '!=', '');
            }
            else if($request->query('filtre') == 'verify'){
                $users->where('worktime', '!=', '00:00:00');
            }


        }

        else if($request->has('startDate') && $request->has('endDate'))
        {
            $users->whereBetween('date',  [date($request->query('startDate')), date($request->query('endDate'))]);

        }
        if($request->has('absent') )
        {
            $users->where('absent', 'True');

        }
        if($request->has('late')){
            $users->where('late', '!=', '');
        }
        if($request->has('present') )
        {
            $users->where('absent', '!=', 'True');
        }
        if($request->has('it') )
        {
            $users->where('department',  'IT');
        }
        if($request->has('direct') ){
            $users->where('department', 'DiRECTION');
        }
        if($request->has('cont') ){
            $users->where('department', 'CONTROLE');
        }
        if($request->has('compt') ){
            $users->where('department', 'COMPTA');
        }
        if($request->has('banq') ){
            $users->where('department', 'IOB');
        }
        if($request->has('recouv') ){
            $users->where('department', 'RECOUVREMENT');
        }

          $users = $users->get();
        // $users = DB::table('users')->get();
        return view('admins/dashboard', ['users'=>$users, 'actel_user'=>$actel_user, 'departs'=>$departs]);
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

    public function recap()
    {
        return view('posts.recap');
    }
}

