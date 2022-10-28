<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/post/show/{blog_post_id}', [\App\Http\Controllers\BlogpostController::class, 'show'])->name('show');
Route::get('/post/delete/{blog_post_id}', [\App\Http\Controllers\BlogpostController::class, 'delete'])->name('delete_post');
Route::get('/post/update/{blog_post_id}', [\App\Http\Controllers\BlogpostController::class, 'edit'])->name('edit_post');
Route::post('/post/update', [\App\Http\Controllers\BlogpostController::class, 'update'])->name('update_post');
Route::get('/post/add', [\App\Http\Controllers\BlogpostController::class, 'add'])->name('add_post');
Route::post('/post/add', [\App\Http\Controllers\BlogpostController::class, 'create'])->name('add_post');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'category'])->name('category_show');
Route::get('/category/delete/{category_id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_category');
Route::get('/category/edit/{category_id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('edit_category');
Route::post('/category/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('update_category');
Route::get('/category/add', [\App\Http\Controllers\CategoryController::class, 'add'])->name('category_add');
Route::post('category/creat', [\App\Http\Controllers\CategoryController::class, 'creat'])->name('category_creat');
