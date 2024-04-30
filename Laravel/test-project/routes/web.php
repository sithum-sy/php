<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ControllerExample;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test-path', [App\Http\Controllers\TestController::class, 'loadTestView']);

Route::get('/test-path2', [App\Http\Controllers\TestController::class, 'loadTestView2']);

Route::get('/test-path3', [App\Http\Controllers\TestController::class, 'loadTestView3']);

Route::get('/test-parameters/{name}', [App\Http\Controllers\TestParametersController::class, 'testURLParams2']);

Route::get('/test-parameters/id/{id}', [App\Http\Controllers\TestParametersController::class, 'testURLParams']);

Route::get('/test-parameters/id/{id}', [App\Http\Controllers\TestParametersController::class, 'testURLParams']);

Route::get('/test-many-params/{id}/{name}', [App\Http\Controllers\TestParametersController::class, 'testManyURLParams']);

Route::get('/test-view/{name}', [App\Http\Controllers\TestViewController::class, 'loadTestView']);

Route::get('/movie', [MovieController::class, 'index'])->name('movies.all');

Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create');

Route::post('/movie/store', [MovieController::class, 'store'])->name('movies.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/example', [ControllerExample::class, 'exampleView']);

Route::get('/exampleParam/{name}', [ControllerExample::class, 'exampleViewParam']);

Route::get('/example-view', [ControllerExample::class, 'exampleTestView']);
