<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\addtocart;

use \App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\CardController as ControllersCardController;
use App\Http\Controllers\CardControllerController;
use Illuminate\Support\Facades\Auth;

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
route::middleware('auth')->group(function(){
    Route::resource('/category',CategoryController::class);
    Route::resource('/product',ProductController::class);
    Route::get('/deleteimg/{id}',[ProductController::class,'imagedelete']);
    Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
  //  Route::resource('/user/home',cardController::class);
   Route::resource('/user',CardController::class);
   Route::get('/products/{product}', 'ProductController@show')->name('products.show');
   Route::get('/productpag/{id}',[cardController::class,'productpag']);
   Route::resource('/addtocart',addtocart::class);
   


});



Auth::routes();

