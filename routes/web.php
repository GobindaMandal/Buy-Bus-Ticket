<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\Product;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Frontend\Home;
use App\Http\Controllers\Frontend\Show;
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


Route::get('/',[Home::class,'index'])->name("home");
Route::post('/show/from-data/fetch',[Show::class,'fetchData1'])->name("show.fetch1");
Route::post('/show/to-data/fetch',[Show::class,'fetchData2'])->name("show.fetch2");


Route::group(['prefix'=>'/product'],function(){
    Route::get('/add',[ProductController::class,'add'])->name('productadd');
    Route::post('/store',[ProductController::class,'store']);
    Route::get('/show',[ProductController::class,'show']);
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    Route::post('/update/{id}',[ProductController::class,'update']);
    Route::get('/destroy/{id}',[ProductController::class,'destroy']);
});

Route::get('/admin', function () {
    return view('backend.dashboard');
})->name("dashboard");

