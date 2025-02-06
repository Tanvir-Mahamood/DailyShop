<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import Product model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Correct variable name
        return view('index', compact('products')); // Pass correct variable to view
    }
}
