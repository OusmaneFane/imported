<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


 Route::get('/', [PostController::class, 'index']);

 Route::get('/posts', [PostController::class, 'index'])->name('board');
 Route::post('/posts', [PostController::class, 'store'])->name('store');
 Route::get('/posts/create', [PostController::class, 'create'])->name('create');
 Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
 Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');
 Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');
// Route::post('/posts/image', [PostController::class, 'photos']);
 Route::get('/posts/importe', [PostController::class, 'importUsers'])->name('import-data');

 Route::get('/posts/verified/{id}', [UserController::class, 'verified'])->name('verified');
// Route::get('/posts/export', [PostController::class, 'exportUsers'])->name('export-data');



Route::get('/users', [UserController::class, 'list'])->name('list');
Route::post('/import_user', [UserController::class, 'import_user'])->name('import_user');

// import - Export
// Route::get('/posts/file-import',[PostController::class,'importView'])->name('import-view');
// Route::post('/posts/import',[PostController::class,'import'])->name('import');
// Route::get('/posts/export-users',[PostController::class,'exportUsers'])->name('export-users');
