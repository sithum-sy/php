<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AuthorController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/publication-register', [PublicationController::class, 'registerPublication'])->name('publication-register');
Route::post('/publication-register/store', [PublicationController::class, 'store'])->name('publication.store');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/author-form', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author-form/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author-form/index', [AuthorController::class, 'index'])->name('author.all');
    // Route::get('/author-form/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
});
//authors