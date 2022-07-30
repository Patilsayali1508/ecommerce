<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productdetails;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::view("/","sidebar");
Route::view("productadd","product_add");
Route::post("product_add",[productdetails::class,'productadd']);
Route::get("cartlist",[productdetails::class,'showproducts']);

