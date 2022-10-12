<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Proof;
use App\Models\Utilisateur;
use PhpParser\Builder\Use_;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PostController;

class UserController extends Controller
{
    //
    public function list(Request $request)
    {

        if(session()->has('PasseUser')){
$PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        $utilisateur = Utilisateur::where('id', '=', session('PasseUser'))->first();
        $users = User::where('no', '!=', null);
        $userstwo = DB::table('users')->distinct()->get();
        $nbre_absent = User::where('absent', 'True')->count()-4;
        $nbre_retard = User::where('late', '!=','')->count();
        $worktime = User::where('worktime', '!=','')->sum(('worktime'));


        $nbre_verify = User::where('worktime', '!=','00:00:00')->count();

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

        if($request->has('startDate') && $request->has('endDate'))
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

         $users = $users->get();


        }

        return view ('users', ['users'=>$users, 'actel_user'=>$actel_user]);
    }
    public function import_user(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);

        // Excel::import(new UsersImport, $request->file('excel_file'));
           Excel::import(new UsersImport, $request->file('excel_file'));

        return redirect()->back()->with('success', 'Données Insérer avec succès');
    }
    public function verified($id, Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        $users = Carbon::now()->toDateTimeString();
        $users = User::where('no', $id);
        $userConge = User::where('no', 'date',$id);
        $nbre_absent = User::where('no', $id)->where('absent', 'True')->count()-6;
        $nbre_retard = User::where('no', $id)->where('late', '!=','')->count();
        $worktime = User::where('no', $id)->where('worktime', '!=','00:00:00')->sum('worktime');
        $nbre_verify = User::where('no', $id)->where('worktime', '!=','00:00:00')->count();
        $worktimefinal = User::where('worktime', '!=','')->sum('worktime');
        $somme = 0;
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




        $users = $users->get();

         $usersWithCongeField = [];
         $conges = Proof::all();
         foreach($conges as $conge){
             $startCongeDate = (new Carbon($conge->startDate))->getTimestamp();
                  $endCongeDate = (new Carbon($conge->endDate))->getTimestamp();

                  foreach($users as $user){
                     $userAbsentDate = (new Carbon($user->date))->getTimestamp();
                     if($user->no == $conge->code ){
                         if($userAbsentDate >= $startCongeDate && $userAbsentDate <= $endCongeDate){
                         array_push($usersWithCongeField , array_merge($user->toArray(), ["isCongee" => true ]));
                     }else{
                         array_push($usersWithCongeField , array_merge($user->toArray(), ["isCongee" => false ]));
                         }
                     
                }else{
                    array_push($usersWithCongeField , array_merge($user->toArray(), ["isCongee" => false ]));

                }
        }
    }

    $sommeTime = 0;
    foreach($usersWithCongeField as $user){
        $timestampun = $user["clockin"];
        $timestamptwo = strtotime($timestampun);
        $timestampthree = $user["clockout"];
        $timestampfour = strtotime($timestampthree);
        $sommeTime += $timestampfour - $timestamptwo  ;
    }
      
         return view ('posts.verified', ['users'=>$usersWithCongeField,  'nbre_absent'=>$nbre_absent,
                                        'nbre_retard'=>$nbre_retard, 'worktime'=>$worktime, 'nbre_verify'=>$nbre_verify,
                                        'worktimefinal'=>$worktimefinal, 'sommeTime'=>$sommeTime, 'actel_user'=>$actel_user]);

    }

    public function find()
    {
        return view('auth.identif');
    }
    public function search(Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        $posts = Post::all();
        $users = DB::table('utilisateurs')->get();


       // return view('posts.index', ['posts' => $posts, 'utilisateurs'=>$users]);
        return view('posts.search', ['posts' => $posts, 'actel_user'=>$actel_user]);
    }

    public function conge(Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        $posts = Post::all();
        return view('/posts/conge', ['posts'=>$posts, 'actel_user'=>$actel_user]);
    }
    public function traite(Request $request)
    {
        request()->validate([
            'code' => ['required'],
            'motif' => ['required'],
            'startDate' => ['required'],
            'endDate' => ['required'],
        ]);

        $query = DB::table('proofs')
        ->insert([
            'code' => $request->code,
            'motif' => $request->motif,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ]);
        if($query){
            return back()->with('success', 'Congé justifié avec succès');
        }else {
            return back()->with('fail', 'Quelque chose s\'est mal passée');
        }
    }


    }






