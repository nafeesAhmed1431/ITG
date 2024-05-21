<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_no',
        'account_no',
        'account_desc',
        'sale_account_no',
        'total',
        'discount',
        'vat_amount',
        'customer_id',
        'customer_name',
        'created_by',
    ];
}
