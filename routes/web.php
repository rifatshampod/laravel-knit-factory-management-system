<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\planController;
use App\Http\Controllers\deliveryController;
use App\Http\Controllers\productionController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboardController;

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

Auth::routes(['register' => false]);  //auth routes call

Route::group(['middleware' => ['web', 'auth']], function(){


Route::get('/',[dashboardController::class,'getData']);  //add redirector later
Route::view('dashboard','index');


// Route::view('create-plan','createPlan');


// Route::view('create-delivery','createDelivery');


//dynamic
Route::get('create-order',[orderController::class, 'retrieveData']); //retrieve dropdown data to show in create page
Route::post('add-order',[orderController::class, 'addData']); //add order to database
Route::get('order',[orderController::class, 'showData']); //show all order
Route::get('edit-order{id}', [orderController::class,'editData']);
Route::put('update-order', [orderController::class,'updateData']);
Route::put('delete-order', [orderController::class,'deleteData']);


//delivery
Route::get('all-delivery',[deliveryController::class, 'showData']);
Route::get('edit-delivery{id}', [deliveryController::class,'editData']);
Route::get('fetch-delivery{id}', [deliveryController::class,'editDeliveryData']);
Route::put('start-receive', [deliveryController::class,'updateReceiveData']);
Route::put('add-receive', [deliveryController::class,'addReceiveData']);
Route::put('add-delivery', [deliveryController::class,'addDeliveryData']);

//receive
Route::get('all-receive',[deliveryController::class, 'showReceiveData']);
Route::get('edit-receive{id}', [deliveryController::class,'editDailyReceiveDataFetch']);
Route::put('edit-daily-receive', [deliveryController::class, 'editDailyReceiveData']); 

//delivery
Route::get('daily-delivery',[deliveryController::class, 'showDeliveryData']);
Route::get('edit-single-delivery{id}', [deliveryController::class,'editDailyDeliveryDataFetch']);
Route::put('edit-daily-delivery', [deliveryController::class, 'editDailyDeliveryData']); 

//plan
Route::get('plan',[planController::class, 'showData']);
Route::get('edit-plan{id}', [planController::class,'editData']);
Route::put('update-plan', [planController::class,'updateData']);

//production
Route::get('all-production',[productionController::class, 'showData']);
Route::get('edit-production{id}', [productionController::class,'editData']);
Route::get('edit-daily{id2}', [productionController::class,'editDailyDataFetch']);
Route::put('update-production', [productionController::class,'updateData']);
Route::put('add-production', [productionController::class,'addDailyData']); // add daily production
Route::get('daily-production',[productionController::class, 'showDailyData']); //day wise production
Route::put('edit-daily-production', [productionController::class, 'editDailydata']); 

//Report ----------------------------------------------------------

//order specific
Route::get('order-report',[orderController::class, 'showReportData']); //show all order report from plan if possible
Route::get('order-report&&body-color={slug}',[orderController::class, 'showBodyColorReportData']);
Route::get('order-report&&print-quality={slug}',[orderController::class, 'showPrintQualityReportData']);
Route::get('order-report&&body-parts={slug}',[orderController::class, 'showPartsReportData']);
//allocation specific
Route::get('allocation-report',[planController::class, 'showReportData']); //show all plan report
Route::get('allocation-report&&section={slug}',[planController::class, 'showSectionReportData']);
//receive/delivery
Route::get('alldel-report',[deliveryController::class, 'showReportData']); //show all rec/del report
//delivery specific 
Route::get('delivery-report-order',[deliveryController::class, 'showOrderNumber']);
Route::post('order-delivery-report',[deliveryController::class, 'getOrderNumberData']);
Route::view('delivery-report-date',"report/getDateDelivery");  //date wise search
Route::post('date-delivery-report',[deliveryController::class, 'getDateWiseData']); //date wise result
//receive specific 
Route::get('receive-report-order',[deliveryController::class, 'showReceiveOrderNumber']);
Route::post('order-receive-report',[deliveryController::class, 'getReceiveOrderNumberData']);
Route::view('receive-report-date',"report/getDateReceive");  //date wise search
Route::post('date-receive-report',[deliveryController::class, 'getDateWiseReceiveData']); //date wise result
//production specific
Route::get('production-report',[productionController::class, 'showReportData']); //show all production report
Route::get('production-report-order',[productionController::class, 'showOrderNumber']);
Route::post('order-production-report',[productionController::class, 'getOrderNumberData']);
Route::view('production-report-date',"report/getDateProduction");  //date wise search
Route::post('date-production-report',[productionController::class, 'getDateWiseData']); //date wise result
//receive specific 
//----------------


//settings----------------------------------------------------------

//merchandiser
Route::get('all-merchandiser',[settingsController::class, 'showMerchandiserData']); //show all merchandiser
Route::put('add-merchandiser', [settingsController::class,'addMerchandiser']); // add new merchandiser
Route::get('get-merchandiser{id}', [settingsController::class,'getMerchandiserData']); //get merchandiser name
Route::put('edit-merchandiser', [settingsController::class,'editMerchandiserData']);
Route::put('delete-merchandiser', [settingsController::class,'deleteMerchandiserData']);

//supplier
Route::get('all-supplier',[settingsController::class, 'showSupplierData']); //show all merchandiser
Route::put('add-supplier', [settingsController::class,'addSupplier']); // add new merchandiser
Route::get('get-supplier{id}', [settingsController::class,'getSupplierData']); //get merchandiser name
Route::put('edit-supplier', [settingsController::class,'editSupplierData']);
Route::put('delete-supplier', [settingsController::class,'deleteSupplierData']);

//bodycolor
Route::get('all-bodycolor',[settingsController::class, 'showBodycolorData']); //show all merchandiser
Route::put('add-bodycolor', [settingsController::class,'addBodycolor']); // add new merchandiser
Route::get('get-bodycolor{id}', [settingsController::class,'getBodycolorData']); //get merchandiser name
Route::put('edit-bodycolor', [settingsController::class,'editBodycolorData']);
Route::put('delete-bodycolor', [settingsController::class,'deleteBodycolorData']);

//printquality
Route::get('all-printquality',[settingsController::class, 'showPrintqualityData']); //show all merchandiser
Route::put('add-printquality', [settingsController::class,'addPrintquality']); // add new merchandiser
Route::get('get-printquality{id}', [settingsController::class,'getPrintqualityData']); //get merchandiser name
Route::put('edit-printquality', [settingsController::class,'editPrintqualityData']);
Route::put('delete-printquality', [settingsController::class,'deletePrintqualityData']);

//parts
Route::get('all-parts',[settingsController::class, 'showPartsData']); //show all merchandiser
Route::put('add-parts', [settingsController::class,'addParts']); // add new merchandiser
Route::get('get-parts{id}', [settingsController::class,'getPartsData']); //get merchandiser name
Route::put('edit-parts', [settingsController::class,'editPartsData']);
Route::put('delete-parts', [settingsController::class,'deletePartsData']);

//users
Route::get('users',[userController::class, 'showUser']);
Route::post('createuser',[userController::class,'makeUser']);
Route::get('edit-user{id}', [userController::class,'editData']);
Route::delete('delete-user', [userController::class,'deleteData']);
Route::put('update-user', [userController::class,'updateData']);

//sections
Route::get('all-sections',[settingsController::class, 'showSectionsData']); //show all merchandiser
Route::put('add-sections', [settingsController::class,'addSections']); // add new merchandiser
Route::get('get-sections{id}', [settingsController::class,'getSectionsData']); //get merchandiser name
Route::put('edit-sections', [settingsController::class,'editSectionsData']);
Route::put('delete-sections', [settingsController::class,'deleteSectionsData']);

});