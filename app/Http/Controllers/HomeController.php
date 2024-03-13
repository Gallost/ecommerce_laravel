<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if (!isset($user))
            return redirect()->guest('login');
        $productIDs = array_keys(json_decode($user->cart, true));
        return view('home')
            ->with('cartItems', Products::whereIn('id', $productIDs)->get());
    }
}
