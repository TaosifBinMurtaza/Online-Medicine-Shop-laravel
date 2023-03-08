<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProfileController;


Route::get('/',[PagesController::class,'login_deliveryrider'])->name('deliveryrider.login');
Route::post('/',[LoginController::class,'login_submit'])->name('deliveryrider.login.submit');
Route::get('/deliveryrider/registration',[PagesController::class,'registration_deliveryrider'])->name('deliveryrider.registration');
Route::post('/deliveryrider/registration',[RegistrationController::class,'registration_submit'])->name('deliveryrider.registration.submit');

Route::get('/deliveryrider/dashboard',[DashboardController::class,'loggedin_deshboard'])->name('loggedin_deshboard')->middleware('authorized');
Route::get('/deliveryrider/order/details/{id}',[DashboardController::class,'order_details'])->name('order.details')->middleware('authorized');
Route::post('/deliveryrider/order/details/{id}',[DashboardController::class,'change_status'])->name('order.details')->middleware('authorized');
Route::get('/deliveryrider/order/history',[OrderHistoryController::class,'orderhistory_details'])->name('order.history.details')->middleware('authorized');

Route::get('/deliveryrider/profile',[ProfileController::class,'profile'])->name('profile')->middleware('authorized');
Route::post('/deliveryrider/profile',[ProfileController::class,'profile_update'])->name('profile_update')->middleware('authorized');

Route::get('/deliveryrider/password',[ProfileController::class,'password'])->name('password')->middleware('authorized');
Route::post('/deliveryrider/password',[ProfileController::class,'password_change'])->name('password_change')->middleware('authorized');


Route::get('/logout',function(){
    session()->flush();
    session()->flash('msg','Sucessfully Logged out');
    return redirect()->route('deliveryrider.login');
                            })->name('logout');