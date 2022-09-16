<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
    public function verified()
    {

            // $users = DB::select('select * from users where no = 0001');

            // foreach ($users as $user) {
    // echo $user->name;
         $users = User::get();
        return view ('posts.verified', ['users'=>$users]);
    //}


}
}
