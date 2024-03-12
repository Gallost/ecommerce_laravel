<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CrossAuthController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials))
            return response()->json(['uid' => Auth::user()->id]);
    }
}
