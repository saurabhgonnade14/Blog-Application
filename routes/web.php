<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::view('blog/create','blog.create')->name('blog.create');
Route::get('blog/create',[BlogController::class,'create']) ->name('blog.create');

Route::post('blog/store',[BlogController::class,'store']) ->name('blog.store');
Route::view('blog/index','blog.index')->name('blog.index');
Route::get('blog/index',[BlogController::class,'index'])->name('blog.index');
Route::get('blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
Route::get('blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');

Route::view('category/create','category.create')->name('category.create');
Route::post('category/store',[CategoryController::class,'store']) ->name('category.store');
Route::view('category/index','category.index')->name('category.index');
Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


Route::get('/',[WelcomeController::class,'index'])->name('welcome');
Route::get('blog/{id}',[BlogController::class,'show'])->name('blog.show');

