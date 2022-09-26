<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use PhpParser\Builder\Use_;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PostController;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function list(Request $request)
    {
        $users = User::where('no', '!=', null);
        $nbre_absent = User::where('absent', 'True')->count()-4;
        $nbre_retard = User::where('late', '!=','')->count();
        $worktime = User::where('worktime', '!=','')->sum('worktime');
        $nbre_verify = User::where('worktime', '!=','')->count();


        if( $request->has('filtre'))
        {
            if($request->query('filtre') == 'absence'){
               $users->where('absent', 'True');

            }
            else if($request->query('filtre') == 'retard'){
                $users->where('late', '!=', '');
            }
            else if($request->query('filtre') == 'verify'){
                $users->where('worktime', '!=', '');
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
        return view ('users', ['users'=>$users]);
    }
    public function import_user(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new UsersImport, $request->file('excel_file'));
        return redirect()->back()->with('success', 'Données Inséreer avec succès');
    }
    public function verified($id, Request $request)
    {
        $users = Carbon::now()->toDateTimeString();
        $users = User::where('no', $id);
        $nbre_absent = User::where('no', $id)->where('absent', 'True')->count()-4;
        $nbre_retard = User::where('no', $id)->where('late', '!=','')->count();
        $worktime = User::where('no', $id)->where('worktime', '!=','')->sum('worktime');
        $nbre_verify = User::where('no', $id)->where('worktime', '!=','')->count();


        if( $request->has('filtre'))
        {
            if($request->query('filtre') == 'absence'){
               $users->where('absent', 'True');

            }
            else if($request->query('filtre') == 'retard'){
                $users->where('late', '!=', '');
            }
            else if($request->query('filtre') == 'verify'){
                $users->where('worktime', '!=', '');
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
         return view ('posts.verified', ['users'=>$users, 'nbre_absent'=>$nbre_absent,
                                        'nbre_retard'=>$nbre_retard, 'worktime'=>$worktime, 'nbre_verify'=>$nbre_verify]);

    }

    public function find()
    {
        return view('auth.identif');
    }


    }






