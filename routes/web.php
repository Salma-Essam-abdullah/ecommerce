<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CategoryController;
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





Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Categories Route  */

Route::get('/categories',[CategoryController::class, 'categoriesIndex'] )->name('categories')->middleware('auth');
Route::get('/categories/create', [CategoryController::class, 'createcategories'])->name('products.createcategories') ->middleware('auth');
Route::post('/category', [CategoryController ::class,'storecategory'])->name('products.storecategory')->middleware('auth');
Route::get('/categories/{categories}/delete',[CategoryController ::class,'deleteCategory'])->name('products.deletecategory')->middleware('auth');
Route::get('/categories/update/{categories}',[CategoryController ::class,'updateCategory'])->name('products.updatecategory')->middleware('auth');
Route::get('/categories/updates/changeValueCategory',[CategoryController ::class,'makeUpdateCategory'])->name('products.updatescategory')->middleware('auth');

/* Products Route  */
Route::get('/products/index', [ProductController::class, 'index'])->name('products.index') ->middleware('auth');
Route::get('/products/create/{category_id}', [ProductController ::class,'create'])->name('products.create')->middleware('auth');
Route::get('/products/{products}',[ProductController ::class,'show'])->name('products.show')->middleware('auth');
Route::get('/products/{products}/delete',[ProductController ::class,'delete'])->name('products.delete')->middleware('auth');
Route::get('/products/update/{products}',[ProductController ::class,'updateView'])->name('products.update')->middleware('auth');
Route::get('/products/updates/changeValue',[ProductController ::class,'makeUpdate'])->name('products.updates')->middleware('auth');
Route::post('/products', [ProductController ::class,'store'])->name('products.store')->middleware('auth');;


/* Auth Route  */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/slider', 'layouts.slider');
Route::view('/log', 'auth.log');

