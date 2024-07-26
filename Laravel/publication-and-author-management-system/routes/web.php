<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/author-form', [AuthorController::class, 'create'])->name('author.create');
    Route::post('/author-form/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/author-form/index', [AuthorController::class, 'index'])->name('author.all');
    Route::get('author-form/{id}/view', [AuthorController::class, 'view'])->name('author.view');
    Route::get('/author-form/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('/author-form/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('/author-form/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::get('/author-form/toggle-status/{id}', [AuthorController::class, 'toggleStatus'])->name('author.toggleStatus');

    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/add-category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.all');
    Route::get('category/{slug}/view', [CategoryController::class, 'view'])->name('category.view');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/toggle-status/{id}', [CategoryController::class, 'toggleStatus'])->name('category.toggleStatus');

    Route::get('/publication-register', [PublicationController::class, 'registerPublication'])->name('publication-register');
    Route::post('/publication-register/store/', [PublicationController::class, 'store'])->name('publication.store');
    Route::get('/publication/author/{authorId}', [PublicationController::class, 'index'])->name('publication.all');
    Route::get('publication/{id}/view', [PublicationController::class, 'view'])->name('publication.view');
    Route::get('/publication/{id}/edit', [PublicationController::class, 'edit'])->name('publication.edit');
    Route::put('/publication/{id}', [PublicationController::class, 'update'])->name('publication.update');
    Route::delete('/publication/{id}', [PublicationController::class, 'delete'])->name('publication.delete');
    Route::get('/publication/toggle-status/{id}', [PublicationController::class, 'toggleStatus'])->name('publication.toggleStatus');

    Route::get('publication_user/{id}/view', [PublicationController::class, 'userSinglePubView'])->name('publication_user.view');
    Route::post('publication_user/{publication}/like', [LikeController::class, 'toggleLike'])->name('publications_user.like');
    Route::post('publication_user/{publication}/comments', [CommentController::class, 'storeComment'])->name('publications_user.comments');
});
