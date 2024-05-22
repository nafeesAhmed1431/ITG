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
        return $this->morphMany(Invoice_items::class, 'invoiceable');
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_no');
    }
}
