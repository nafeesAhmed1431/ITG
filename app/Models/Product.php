<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_no',
        'name',
        'description',
        'unit',
        'purchase_rate',
        'sale_rate',
        'sale_rate_2',
        'sale_rate_3',
        'stock_alert',
        'group',
        'lock',
        'location',
    ];
}
