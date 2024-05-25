<?php

namespace App\Http\Controllers;

use App\Models\Invoice_items;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Create the Sale
        $sale = Sale::create([
            'sale_no' => $request->sale_number,
            'account_no' => $request->sale_account,
            'account_desc' => $request->sale_account_name,
            'total' => 0,
            'discount' => 0,
            'vat_amount' => 0,
            'customer_id' => $request->sale_customer,
            'customer_name' => $request->sale_customer_name,
            'created_by' => 1
        ]);

        $total = 0;
        $discount = 0;

        // Insert into the invoice_items table
        foreach ($request->item_id as $index => $itemId) {

            $sub_total = $request->qty[$index] * $request->rate[$index];

            $discount_amount = (($request->discount[$index] / 100) * $sub_total);

            $discount += $discount_amount;

            $total += $sub_total - $discount_amount;

            Invoice_items::create([
                'invoiceable_id' => $sale->id,
                'invoiceable_type' => Sale::class,
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
    public function show(Sale $sale)
    {
        $sale->load('invoiceItems', 'customer', 'account');
        return view('sale.show', compact('sale'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = DB::table('sales')
            ->select('sales.*', 'customer.*','customer.name as customer_name', 'account.*')
            ->join('users as customer', 'customer.id', '=', 'sales.customer_id')
            ->join('accounts as account', 'account.id', '=', 'sales.account_no')
            ->where('sales.id', $id)
            ->first();

        $items = DB::table('invoice_items')
            ->select('invoice_items.*', 'products.*')
            ->join('products', 'products.id', '=', 'invoice_items.item_id')
            ->where(['invoice_items.invoiceable_id' => $id, 'invoice_items.invoiceable_type' => Sale::class])
            ->get();

        return view('sale.edit', compact('sale', 'items'));
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
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sale.index')->with('success', 'Sale Deleted Successfully');
    }
}
