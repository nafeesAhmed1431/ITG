<?php

namespace App\Http\Controllers;

use App\Models\Invoice_items;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::latest()->get();
        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data here

        // Insert into the sales table
        $sale = Sale::create([
            'sale_no' => $request->sale_number,
            'account_no' => $request->sale_account,
            'account_desc' => $request->sale_account_name,
            'sale_account_no' => $request->sale_account,
            'total' => 0, // Initially 0, will be calculated later
            'discount' => 0, // Initially 0, will be calculated later
            'vat_amount' => 0, // Initially 0, will be calculated later
            'customer_id' => $request->sale_customer,
            'customer_name' => $request->sale_customer_name,
            'created_by' => 1
        ]);

        $total = 0;
        $discount = 0;

        // Insert into the sale_items table
        foreach ($request->item_id as $index => $itemId) {
            $itemTotal = $request->qty[$index] * $request->rate[$index] - $request->discount[$index];
            $total += $itemTotal;
            $discount += $request->discount[$index];

            Invoice_items::create([
                'type' => 'credit',
                'tr_no' => $sale->id,
                'invoice_no' => $sale->sale_no,
                'invoice_type' => 'sale',
                'item_id' => $itemId,
                'item_no' => $request->item_number[$index],
                'item_desc' => 'item description',
                'item_desc2' => 'item description 2',
                'item_unit' => 'pcs',
                'sale_rate' => $request->rate[$index],
                'purchase_rate' => 0,
                'pur_rate_on_sale' => 0,
                'discount_amount' => $request->discount[$index],
                'tax_amount' => 0,
                'debit_qty' => 0,
                'credit_qty' => $request->qty[$index],
                'account_no' => $sale->account_no,
                'account_des' => $sale->account_desc,
                'item_location' => 'location',
                'tax_per' => 0,
            ]);
        }

        // Update the total, discount, and vat_amount in the sale record
        $sale->update([
            'total' => $total,
            'discount' => $discount,
        ]);

        return response()->json(['status' => true, 'message' => 'Sale created successfully.']);
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
