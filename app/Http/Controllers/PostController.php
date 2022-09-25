<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }


    public function create()
    {
        return view('posts.create')->with('Employé créer avec succès');

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

    //    $this ->validate($request, [
    //         'excel_file'=>'required|mimes:xlsx',
    //     ]);

       // Excel::import(new ImportUser, $request->file('excel_file'));

    //     $excel_file = $request->excel_file->move(public_path(), $request->excel_file->hashName());
    //   //  return redirect()->back()->with('Succes imported');

          return view('posts.importe');

              }


    public function exportUsers()
    {
        return view('posts.export');
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
