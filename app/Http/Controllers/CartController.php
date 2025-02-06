<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    
    public function add(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Get the product ID from the request
        $productId = $request->input('product_id');

        // Get the current cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // If the product is already in the cart, increment the quantity
            $cart[$productId]['quantity']++;
        } else {
            // If the product is not in the cart, add it
            $product = Product::find($productId);
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price, // Assuming you have a 'price' field in your products table
                'image_url' => $product->image_url,
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart!');
    }
}*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $product = Product::find($productId);
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image_url' => $product->image_url,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function view()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}