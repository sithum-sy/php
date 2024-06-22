<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;


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
    Route::get('author-form/{id}/view', [AuthorController::class, 'view'])->name('author.view');
    Route::get('/author-form/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/author-form/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/author-form/{id}', [AuthorController::class, 'delete'])->name('author.delete');

    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/add-category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.all');
    Route::get('category/{slug}/view', [CategoryController::class, 'view'])->name('category.view');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/toggle-status/{id}', [CategoryController::class, 'toggleStatus'])->name('category.toggleStatus');
});
