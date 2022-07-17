<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/projects', [ProjectsController::class, 'index']);
    Route::get('/projects/{project}', [ProjectsController::class, 'show']);
    Route::post('/projects', [ProjectsController::class, 'store']);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
