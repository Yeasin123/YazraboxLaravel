<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainShopController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('mainshop', [MainShopController::class , 'index'])->name('allmainshop');
Route::get('category', [CategoryController::class , 'index'])->name('category');
Route::match(['get', 'post'],'category/addedit/{id?}', [CategoryController::class , 'addeditCategory'])->name('addeditCategory');
Route::post('category/delete/{id}', [CategoryController::class , 'delete'])->name('ctgdelete');

