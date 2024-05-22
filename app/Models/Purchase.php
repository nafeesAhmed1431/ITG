<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice_items;

class Purchase extends Model
{
    use HasFactory;

    public function invoiceItems()
    {
        return $this->morphMany(Invoice_items::class, 'invoiceable');
    }
}
