<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => '/posts'], function () {
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::get('/show/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::post('/like/{post:id}', [PostController::class, 'liker'])->name('post.like');
});