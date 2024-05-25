<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice_items;


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

    public function invoiceItems()
    {
        return $this->hasMany(Invoice_items::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Invoice_items::class, 'invoice_id', 'id', 'id', 'item_id');
    }
}
