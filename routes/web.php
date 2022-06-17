<?php

use App\Http\Controllers\ShopController;
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

route::get('shop',[ShopController::class,'index']);
route::post('store',[ShopController::class,'store']);
route::get('show',[ShopController::class,'show']);
route::post('destroy',[ShopController::class,'destroy']);
route::get('edit',[ShopController::class,'edit']);
route::post('update',[ShopController::class,'update']);


