<?php

namespace App\Http\Controllers;

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
        return view('sale.index',compact('sales'));
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
        /**
         * 
         * 
         * Array
(
    [_token] => m3LEUQ6r9yoWrcZECWWJhVtwlGLs9oYmCdkFlpdY
    [sale_number] => 123
    [sale_title] => sa
    [sale_date] => 2024-05-21
    [sale_customer] => 4
    [sale_customer_name] => Customer 1
    [account_no] => 4
    [sale_account_name] => Sales Revenue
    [item_id] => Array
        (
            [0] => 3
            [1] => 5
        )

    [item_number] => Array
        (
            [0] => 3
            [1] => 5
        )

    [qty] => Array
        (
            [0] => 10
            [1] => 15
        )

    [rate] => Array
        (
            [0] => 18
            [1] => 35
        )

    [discount] => Array
        (
            [0] => 10
            [1] => 15
        )

    [total] => Array
        (
            [0] => 162
            [1] => 446.25
        )

)

         * 
         * */ 

        //  `sale_no`, `account_no`, `account_desc`, `sale_account_no`, `total`, `discount`, `vat_amount`, `customer_id`, `customer_name`, `created_by`,
        $sale = Sale::create([
            'sale_no' => $request->sale_number,
            'account_no' => $request->account_no,
            'account_desc' => $request->sale_account_name,
            'sale_account_no' => $request->account_no,
        ]);
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
