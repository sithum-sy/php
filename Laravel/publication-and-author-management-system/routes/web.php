<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/publication-register', [PublicationController::class, 'registerPublication'])->name('publication-register');

Route::post('/publication-register/store', [PublicationController::class, 'store'])->name('publication.store');
