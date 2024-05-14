<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate(Request $req)
    {
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        return response()->json(['message' => 'Authentication successful'], 200);
        exit;

        if (Auth::attempt($data)) {
            return response()->json(['message' => 'Authentication successful'], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
