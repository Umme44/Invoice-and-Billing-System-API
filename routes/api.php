<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//INVOICE
Route::post('/invoice',[InvoiceController::class, 'store'])->middleware('role:admin,accountant,user');
Route::get('/invoices',[InvoiceController::class, 'index'])->middleware('role:admin,accountant');

//PAYMENT
Route::post('/payment',[PaymentController::class, 'store'])->middleware('role:admin,accountant,user');

//AUTHENTICATION 
Route::post('/register',[UserController::class, 'register'])->middleware('role:admin,accountant,user');
Route::post('/login',[UserController::class, 'login'])->middleware('role:admin,accountant,user');
Route::post('/logout',[UserController::class, 'logout'])->middleware('role:admin,accountant,user');

//USER
Route::get('/users',[UserController::class, 'index'])->middleware('role:admin,accountant');
Route::put('/user/{id}',[UserController::class, 'update']) ->middleware('role:admin');
Route::delete('/user/{id}',[UserController::class, 'destroy']) ->middleware('role:admin');