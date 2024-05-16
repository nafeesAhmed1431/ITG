<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct;
use App\Http\Requests\EditProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\PdoCaster;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProduct $request)
    {
        /*        
        [product_name] => 
        [product_unit] => 
        [product_number] => 
        [purchase_rate] => 
        [sale_rate] => 
        [sale_rate_2] => 
        [sale_rate_3] => 
        [stock_alert] => 
        [group] => 
        [product_location] => 
        [description] =>         
        */

        $product = $request->validated();

        $lock = isset($data['product_lock']) && $data['product_lock'] == "on" ? 1 : 0;
        $res = Product::create([
            'product_no' => $product['product_number'],
            'name' => $product['product_name'],
            'description' => $product['description'],
            'unit' => $product['product_unit'],
            'purchase_rate' => $product['purchase_rate'],
            'sale_rate' => $product['sale_rate'],
            'sale_rate_2' => $product['sale_rate_2'],
            'sale_rate_3' => $product['sale_rate_3'],
            'stock_alert' => $product['stock_alert'],
            'group' => $product['group'],
            'lock' => $lock,
            'location' => $product['product_location'],
        ]);

        return response()->json(['status' => true], 201);
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
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, EditProduct $req)
    {
        $data = $req->validated();
        $lock = isset($data['product_lock']) && $data['product_lock'] == "on" ? 1 : 0;
        $product->product_no = $data['product_number'];
        $product->name = $data['product_name'];
        $product->description = $data['description'];
        $product->unit = $data['product_unit'];
        $product->purchase_rate = $data['purchase_rate'];
        $product->sale_rate = $data['sale_rate'];
        $product->sale_rate_2 = $data['sale_rate_2'];
        $product->sale_rate_3 = $data['sale_rate_3'];
        $product->stock_alert = $data['stock_alert'];
        $product->group = $data['group'];
        $product->lock = $lock;
        $product->location = $data['product_location'];
        $res = $product->save();
        return response()->json(['status' => $res], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}
