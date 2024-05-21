<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_items extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'tr_no',
        'invoice_no',
        'invoice_type',
        'item_id',
        'item_no',
        'item_desc',
        'item_desc2',
        'item_unit',
        'sale_rate',
        'purchase_rate',
        'pur_rate_on_sale',
        'discount_amount',
        'tax_amount',
        'debit_qty',
        'credit_qty',
        'account_no',
        'account_des',
        'item_location',
        'tax_per',
    ];
}
