<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function customer(Request $request)
    {
        $search = $request->input('search_query');
        $users = Product::where('name', 'LIKE', "%$search%")
            ->limit(10)
            ->get();

        return response()->json($users);
    }
}
