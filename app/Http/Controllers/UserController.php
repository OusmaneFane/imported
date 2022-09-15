<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
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


}
