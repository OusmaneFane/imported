<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        $posts = Post::all();
        $users = DB::table('utilisateurs')->get();


        return view('posts.index', ['posts' => $posts, 'utilisateurs'=>$users, 'actel_user'=>$actel_user]);
    }


    public function create(Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        return view('posts.create', ['actel_user'=>$actel_user])->with('success', 'Employé créer avec succès');

    }


    public function store()
    {
        request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'email' => 'required',
            'code' => 'required',
        ]);

        Post::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'poste' =>request('poste'),
            'email' =>request('email'),
            'code' =>request('code'),
        ]);

        return redirect('/posts');
    }


    public function edit(Post $post, Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
        return view('posts.edit', ['post' => $post, 'actel_user'=>$actel_user]);
    }


    public function update(Post $post)
    {

        request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'email' => 'required|email',
        ]);

        $post->update([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'poste' => request('poste'),
            'email' => request('email'),
            'code' => request('code'),

        ]);

        return redirect('/posts')->with('Modification réussie');
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }


    public function importUsers(Request $request)
    {
        $PasseUser = $request->session()->get('PasseUser');
        $actel_user = Utilisateur::find($PasseUser);
          return view('posts.importe', ['actel_user'=>$actel_user]);

     }


}
