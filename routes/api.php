<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API_loginController;
use App\Http\Controllers\API_logoutController;
use App\Http\Controllers\API_registrationController;
use App\Http\Controllers\API_pendingOrderController;
use App\Http\Controllers\API_profileController;
use App\Http\Controllers\API_orderHistoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/deliveryman/login',[API_loginController::class,'login_submit']);
Route::post('/deliveryman/logout',[API_logoutController::class,'logout']);

Route::post('/deliveryman/registration',[API_registrationController::class,'registration_submit']);
Route::get('/deliveryman/pendingorder',[API_pendingOrderController::class,'pending_order'])->middleware("APImiddleware"); 
Route::get('/deliveryman/orderdetails/{id}',[API_pendingOrderController::class,'order_details'])->middleware("APImiddleware"); 
Route::post('/deliveryman/details/update',[API_pendingOrderController::class,'change_status'])->middleware("APImiddleware"); 


Route::get('/deliveryman/orderhistory',[API_orderHistoryController::class,'orderhistory_details'])->middleware("APImiddleware"); 


Route::get('/deliveryman/profile/info',[API_profileController::class,'profile'])->middleware("APImiddleware");
Route::post('/deliveryman/security',[API_profileController::class,'password_change'])->middleware("APImiddleware");
Route::post('/deliveryman/profile/update',[API_profileController::class,'profile_update'])->middleware("APImiddleware");
Route::post('/deliveryman/profile/status',[API_profileController::class,'status_update'])->middleware("APImiddleware");
Route::post('/deliveryman/profile/picture',[API_profileController::class,'pic_change'])->middleware("APImiddleware");