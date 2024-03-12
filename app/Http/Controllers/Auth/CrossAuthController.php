<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CrossAuthController extends Controller
{
    public function authenticate(Request $request) {
        $user = Auth::user();
        if (!isset($user)) return redirect()->guest('login');
        return response()->json(['uid' => $user->id]);
    }
}
