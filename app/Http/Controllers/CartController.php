<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Add a book to the cart.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Set user_id to a static number (e.g., 1)
        $cart = Cart::create([
            'user_id' => 1, // Static user_id
            'book_id' => $validatedData['book_id'],
            'quantity' => $validatedData['quantity'],
        ]);

        return redirect()->route('cart.index')->with('success', 'book added to cart.');
    }

    /**
     * Display the cart items.
     */
    public function index()
    {
        $carts = Cart::with('book')->where('user_id', 1)->get(); // Static user_id
        return view('cart.index', compact('carts'));
    }

    /**
     * Remove a book from the cart.
     */
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', 1)->firstOrFail(); // Static user_id
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'book removed from cart.');
    }
}
