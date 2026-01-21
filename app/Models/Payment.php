<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['amount','invoice_id'];

   public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}