<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicationController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/publication-register', [publicationController::class, 'registerPublication'])->name('publication-register');

Route::post('/publication-register/store', [publicationController::class, 'store'])->name('publication.store');
