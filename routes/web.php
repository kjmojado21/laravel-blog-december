<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/post',[PostController::class,'create'])->name('post.create');
    Route::post('/store',[PostController::class,'store'])->name('post.store');


});
