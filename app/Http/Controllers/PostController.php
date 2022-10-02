<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        $users = DB::table('utilisateurs')->get();


        return view('posts.index', ['posts' => $posts, 'utilisateurs'=>$users]);
    }


    public function create()
    {

        return view('posts.create')->with('success', 'Employé créer avec succès');

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


    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
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
          return view('posts.importe');

     }





    // public function uploadUsers(Request $request)
    // {
    //     Excel::import(new ImportUser, $request->file);
    //     return redirect('posts.index')->with('Données importées avec succès');

    // }

    // Import - Export

    // public function importView(Request $request){
    //     return view('posts.index');
    // }

    // public function import(Request $request){
    //     Excel::import(new ImportUser, $request->file('file')->store('files'));
    //     return redirect()->back();
    // }

    // public function exportUsers(Request $request){
    //     return Excel::download(new ExportUser, 'users.xlsx');
    // }
}
