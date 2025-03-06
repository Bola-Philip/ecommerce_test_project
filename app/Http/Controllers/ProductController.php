<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['reviews'])->findOrFail($id); // Retrieve product by ID
        return view("products.show", compact("product")); // Return the view with the product
    }

    public function changeStatus(Product $product): void
    {
        $product->update(['status' => ! $product->status, 'status_updated_at' => now()]);
    }
}
