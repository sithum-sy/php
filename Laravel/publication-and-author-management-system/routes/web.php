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
    Route::get('/author-register', [AuthorController::class, 'create'])->name('author.create');
    Route::get('/author-register', [AuthorController::class, 'index'])->name('author.all');
    Route::post('/author-register/store', [AuthorController::class, 'store'])->name('author.store');
});
//authors