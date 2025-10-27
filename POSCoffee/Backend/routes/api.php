<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;

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


//Product
Route::get('/product',[ProductController::class,'index'])->name('product');

// category
Route::get('/category',[CategoryController::class,'index'])->name('category');

//role
Route::get('/role',[RoleController::class,'index'])->name('role');

// user
Route::get('/user',[UserController::class,'index'])->name('user');
Route::post('/user',[UserController::class,'store'])->name('user.store');
//position
Route::get('/position',[PositionController::class,'index'])->name('position');
