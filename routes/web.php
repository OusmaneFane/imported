<?php

use App\Mail\UserEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


 Route::get('/', [PostController::class, 'index']);


 Route::post('/posts', [PostController::class, 'store'])->name('store');
 Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
 Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');
 Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');
// Route::post('/posts/image', [PostController::class, 'photos']);
 Route::get('/posts/importe', [PostController::class, 'importUsers'])->name('import-data');
 //Connexion
 Route::get('/posts/login', [LoginController::class, 'exportUsers'])->middleware('AlreadyLoggedIn');
 Route::post('/posts/check', [LoginController::class, 'check']);
 //Inscription
 Route::get('/posts/inscrit', [LoginController::class, 'inscription'])->middleware('AlreadyLoggedIn');
 Route::post('/posts/trait', [LoginController::class, 'trait']);
 Route::get('/logout', [LoginController::class, 'logout']);




 Route::get('/posts/{id}/filtre ', [UserController::class, 'filtre'])->name('filtre');
 Route::get('/posts/verified/{id}', [UserController::class, 'verified'])->name('verified');
// Route::get('/posts/export', [PostController::class, 'exportUsers'])->name('export-data');

//search
Route::get('/posts/search', [UserController::class, 'search'])->name('search');
Route::post('/posts/search', [UserController::class, 'data'])->name('data');

//users
Route::get('/users', [UserController::class, 'list'])->middleware('list');
Route::post('/import_user', [UserController::class, 'import_user'])->name('import_user');
Route::post('/users', [UserController::class, 'list']);
//admin
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::get('/admins/dashboard', [LoginController::class, 'administrator']);
    Route::post('/admins/dashboard', [LoginController::class, 'administrator']);
    Route::get('/', [PostController::class, 'index']);
    Route::get('/posts', [PostController::class, 'index'])->name('board');



  });

  // congé
  Route::get('/posts/conge', [UserController::class, 'conge'])->name('conge');
  Route::post('/posts/traite', [UserController::class, 'traite']);


// import - Export
// Route::get('/posts/file-import',[PostController::class,'importView'])->name('import-view');
// Route::post('/posts/import',[PostController::class,'import'])->name('import');
// Route::get('/posts/export-users',[PostController::class,'exportUsers'])->name('export-users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::post('/email/index', [LoginController::class, 'envoi'])->name('send.email');

//Mail
Route::get('send-email', function(){
    $mailData = [
        "name" => "Test Name",
        "dob" => "19/10/2022"
    ];

    Mail::to('ousmanefane08@gmail.com')->send(new UserEmail($mailData));
    dd("Mail envoyé avec succès!");
});
Route::get('send-email2', [UserController::class, 'mails']);