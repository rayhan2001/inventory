<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
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

Route::resource('user',UserController::class);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

//===========Route List=============
    Route::resource('employee',EmployeeController::class);
    Route::get('/employee-status{id}',[EmployeeController::class,'status'])->name('employee.status');

    Route::resource('customer',CustomerController::class);
    Route::get('/customer-status{id}',[CustomerController::class,'status'])->name('customer.status');

    Route::resource('supplier',SupplierController::class);
    Route::get('/supplier-status{id}',[SupplierController::class,'status'])->name('supplier.status');
});
