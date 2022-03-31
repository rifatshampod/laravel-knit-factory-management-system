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

// Route::get('/', function () {
//     return view('login');
// });
Route::view('/','index');  //add redirector later
Route::view('dashboard','index');
Route::view('create-order','createOrder');
Route::view('order','allOrder');
Route::view('create-plan','createPlan');
Route::view('plan','allPlan');
Route::view('production-report','productionReport');
Route::view('create-delivery','createDelivery');
Route::view('delivery-report','allReport');
