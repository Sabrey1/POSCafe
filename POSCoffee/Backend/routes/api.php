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
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CountryController;


// Customer
Route::get('/customer',[CustomerController::class,'index'])->name('customer');
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::post('/customer',[CustomerController::class,'store'])->name('customer.store');
Route::put('/customer/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::delete('/customer/{id}',[CustomerController::class,'destroy'])->name('customer.destroy');

//Employee
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/employee/{id}',[EmployeeController::class,'show'])->name('employee.show');
Route::post('/employee',[EmployeeController::class,'store'])->name('employee.store');
Route::put('/employee/{id}',[EmployeeController::class,'update'])->name('employee.update');
Route::delete('/employee/{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');

//Product
Route::get('/product',[ProductController::class,'index'])->name('product');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::put('/product/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('product.destroy');

// category
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('/category',[CategoryController::class,'store'])->name('category.store');
Route::put('/category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

//role
Route::get('/role',[RoleController::class,'index'])->name('role');
Route::get('/role/{id}',[RoleController::class,'show'])->name('role.show');
Route::post('/role',[RoleController::class,'store'])->name('role.store');
Route::put('/role/{id}',[RoleController::class,'update'])->name('role.update');
Route::delete('/role/{id}',[RoleController::class,'destroy'])->name('role.delete');

// user
Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/user/{id}',[UserController::class,'show'])->name('user.show');
Route::post('/user',[UserController::class,'store'])->name('user.store');
Route::put('/user/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('/user/{id}',[UserController::class,'destroy'])->name('user.destroy');

// login
Route::post('/login',[UserController::class,'login'])->name('login');

//position
Route::get('/position',[PositionController::class,'index'])->name('position');
Route::get('/position/{id}',[PositionController::class,'show'])->name('position.show');
Route::post('/position',[PositionController::class,'store'])->name('position.store');
Route::put('/position/{id}',[PositionController::class,'update'])->name('position.update');
Route::delete('/position/{id}',[PositionController::class,'destroy'])->name('position.destroy');

//Currency
Route::get('/currency',[CurrencyController::class,'index'])->name('currency');
Route::get('/currency/{id}',[CurrencyController::class,'show'])->name('currency.show');
Route::post('/currency',[CurrencyController::class,'store'])->name('currency.store');
Route::put('/currency/{id}',[CurrencyController::class,'update'])->name('currency.update');
Route::delete('/currency/{id}',[CurrencyController::class,'destroy'])->name('currency.destroy');

//Country
Route::get('/country',[CountryController::class,'index'])->name('country');
Route::get('/country/{id}',[CountryController::class,'show'])->name('country.show');
Route::post('/country',[CountryController::class,'store'])->name('country.store');
Route::put('/country/{id}',[CountryController::class,'update'])->name('country.update');
Route::delete('/country/{id}',[CountryController::class,'destroy'])->name('country.destroy');
