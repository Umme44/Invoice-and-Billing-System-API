<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
     protected $fillable = ['invoice_date', 'items'];


    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }
    
    public function payment()
    {
        return $this->hasOne(Payment::class, 'invoice_id');
    }


}
