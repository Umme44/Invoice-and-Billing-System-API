<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::post('/invoice',[InvoiceController::class, 'store']);
Route::get('/invoices',[InvoiceController::class, 'index']);
// Route::post('/payment',[PaymentController::class, 'store']);