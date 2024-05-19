<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    function customer(Request $request)
    {
        $search = $request->input('search_query');

        return response()->json(User::where('name', 'LIKE', "%$search%")
            ->where('role', User::ROLE_CUSTOMER)
            ->get());
    }

    public function account(Request $request)
    {
        $search = $request->input('search_query');
        return response()->json(Account::where('name', 'LIKE', "%$search%")->orWhere('account_no', 'like', "%$search%")->get());
    }


    function product(Request $request)
    {
        $search = $request->input('search_query');
        return response()->json(Product::where('name', 'LIKE', "%$search%")->orWhere('product_no', 'like', "%$search%")->get());
    }
}
