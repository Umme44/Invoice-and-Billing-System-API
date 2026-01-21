<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    //
    protected $fillable = ['quantity', 'unit_price', 'subtotal', 'invoice_id'];


 public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
