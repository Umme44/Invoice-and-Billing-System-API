<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()


    {
        //
$invoice=Invoice::With('items')->get();
        return $invoice;

        // $invoice=Invoice::all();
        // return $invoice;
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
    $invoice = Invoice::create([
        'invoice_date' => $request->invoice_date,
        'status'       => 'unpaid',
    ]);

    $subtotal = 0;

    foreach ($request->invoice_items as $item) {
        $itemSubtotal = $item['quantity'] * $item['unit_price'];
        $subtotal += $itemSubtotal;

        $invoice->items()->create([
            'product_name' => $item['product_name'],
            'quantity'     => $item['quantity'],
            'unit_price'   => $item['unit_price'],
            'subtotal'     => $itemSubtotal,
        ]);
    }

    $tax = $subtotal * 0.10;       
    $discount = $subtotal * 0.05;  

    $totalAmount = $subtotal + $tax - $discount;

    $invoice->update([
        'total_amount' => $totalAmount,
        'tax'          => $tax,
        'discount'     => $discount,
    ]);

    return response()->json($invoice->load('items'), 201);
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
