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

class UserController extends Controller
{
    //
    public function list()
    {
        $users = User::get();
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
        $users = User::where('no', $id);
        $nbre_absent = User::where('no', $id)->where('absent', 'True')->count();
        $nbre_retard = User::where('no', $id)->where('late', '!=','')->count();
        $worktime = User::where('no', $id)->where('worktime', '!=','')->sum('worktime');
        $nbre_verify = User::where('no', $id)->where('worktime', '!=','')->count();;

        if( $request->has('filtre'))
        {
            if($request->query('filtre') == 'absence'){
               $users->where('absent', 'True');

            }
            else if($request->query('filtre') == 'retard'){
                $users->where('late', '!=', '');
            }
            else if($request->query('filtre') == 'verify'){
                $users->where('worktime', '=', '');
            }
        }
         $users = $users->get();
         return view ('posts.verified', ['users'=>$users, 'nbre_absent'=>$nbre_absent,
                                        'nbre_retard'=>$nbre_retard, 'worktime'=>$worktime, 'nbre_verify'=>$nbre_verify]);

    }

    // public function filtre($id)
    // {
    //     $posts = Post::all();
    //    //$users = DB::select('select * from users where absent = true');

    //         // foreach ($users as  $user) {
    // // echo $user->name;
    //      $users = User::where ('absent', $id)->get();
    //     return view ('posts.filtre', ['users'=>$users]);
    // //}

    //     //return view('posts.filtre');
    // }




}
