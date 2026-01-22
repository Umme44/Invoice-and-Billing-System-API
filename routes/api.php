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
Route::post('/invoice',[InvoiceController::class, 'store'])->middleware(['auth:sanctum','role:admin,accountant,user']);
Route::get('/invoices',[InvoiceController::class, 'index'])->middleware(['auth:sanctum','role:admin,accountant']);
Route::put('/invoice/{id}',[InvoiceController::class, 'update'])->middleware(['auth:sanctum','role:admin,accountant']);
Route::delete('/invoice/{id}',[InvoiceController::class, 'delete'])->middleware(['auth:sanctum','role:admin,accountant']);

// Route::post('/invoice',[InvoiceController::class, 'store']);
// Route::get('/invoices',[InvoiceController::class, 'index']);
// Route::put('/invoice/{id}',[InvoiceController::class, 'update']);
// Route::delete('/invoice/{id}',[InvoiceController::class, 'delete']);

//PAYMENT
Route::post('/payment',[PaymentController::class, 'store'])->middleware(['auth:sanctum','role:admin,accountant,user']);

//AUTHENTICATION 
Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::post('/logout',[UserController::class, 'logout']);

//USER
Route::get('/users',[UserController::class, 'index'])->middleware(['auth:sanctum','role:admin,accountant']);
Route::put('/user/{id}',[UserController::class, 'update']) ->middleware(['auth:sanctum','role:admin']);
Route::delete('/user/{id}',[UserController::class, 'destroy']) ->middleware(['auth:sanctum','role:admin']);