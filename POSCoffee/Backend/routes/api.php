<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Customer
Route::get('/customer',[CustomerController::class,'index'])->name('customer');
Route::post('/customer',[CustomerController::class,'store'])->name('customer.store');
Route::put('/customer/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::delete('/customer/{id}',[CustomerController::class,'destroy'])->name('customer.destroy');

//Employee
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
