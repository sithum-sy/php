<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/publication-form', [PublicationController::class, 'create'])->name('publication.create');
Route::post('/publication-form', [PublicationController::class, 'store'])->name('publication.store');
