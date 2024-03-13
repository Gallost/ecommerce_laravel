<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Auth;

class ProductController extends Controller
{
    public static function generateFakeProducts(int $num) {
        Products::truncate();
        Products::factory($num)->create();
    }

    public function getCatalogueView(Request $request) {
        return view('catalogue')
            ->with('products', Products::all())
            ->with('cartItems', Auth::check() ? Auth::user()->cartItems : []);
    }

    public function getItemView(Request $request, $id) {
        return view('product')
            ->with('product', Products::find($id));
    }

    public function addToCart(Request $request) {
        $user = Auth::user();
        if (!isset($user))
            return redirect()->guest('login');
        $cart = json_decode($user->cart, true);
        $cart[$request->id] = null;
        $user->cart = $cart;
        $user->save();
        return response()->json("Added item $request->id to cart.");
    }

    public function getCartView(Request $request) {
        $user = Auth::user();
        if (!isset($user))
            return redirect()->guest('login');
        $productIDs = array_keys(json_decode($user->cart, true));
        return view('cart')
            ->with('cartItems', $user->cartItems);
    }

    public function clearCart() {
        $user = Auth::user();
        if (!isset($user))
            return redirect()->guest('login');
        $user->cart = json_encode([]);
        $user->save();
    }
}
