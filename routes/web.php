<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\planController;
use App\Http\Controllers\deliveryController;
use App\Http\Controllers\productionController;

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


Route::view('create-plan','createPlan');

Route::view('production-report','productionReport');
Route::view('create-delivery','createDelivery');


//dynamic
Route::get('create-order',[orderController::class, 'retrieveData']); //retrieve dropdown data to show in create page
Route::post('add-order',[orderController::class, 'addData']); //add order to database
Route::get('order',[orderController::class, 'showData']); //show all order

//delivery
Route::get('all-delivery',[deliveryController::class, 'showData']);
Route::get('edit-delivery{id}', [deliveryController::class,'editData']);
Route::put('start-receive', [deliveryController::class,'updateReceiveData']);
Route::put('add-receive', [deliveryController::class,'addReceiveData']);

//receive
Route::get('all-receive',[deliveryController::class, 'showReceiveData']);

//plan
Route::get('plan',[planController::class, 'showData']);
Route::get('edit-plan{id}', [planController::class,'editData']);
Route::put('update-plan', [planController::class,'updateData']);

//production
Route::get('all-production',[productionController::class, 'showData']);