<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $payment=Payment::With('payment')->get();
        return  $payment;

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $payment = Payment::create([
        'invoice_id' => $request->invoice_id,
        'amount' => $request->amount,
    ]);

    
    $invoice = $payment->invoice; 
    $invoice->status = 'paid';
    $invoice->save();

    return response()->json([
        'message' => 'Payment created and invoice status updated.',
        'payment' => $payment,
        'invoice' => $invoice
    ]);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
