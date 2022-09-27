<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
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

//Route::get('/', function () {
//    return view('app');
//});
Route::get('/register', [RegisterController::class, 'show']);


Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);


Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/tag_main', [TagsController::class, 'index'])->name('tag_main');

Route::post('/tag_main', [TagsController::class, 'store'])->name('tag_save');

Route::delete('/tag_main/{id}', [TagsController::class, 'destroy'])->name('tag_destroy');
Route::get('/posts/list', [PostController::class, 'list'])->name('posts.list');
Route::resource('categories', CategoriesController::class);
Route::resource('posts', PostController::class);


