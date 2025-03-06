<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Pipelines\Product\CategoryFilter;
use App\Pipelines\Product\MaxPriceFilter;
use App\Pipelines\Product\MinPriceFilter;
use App\Pipelines\Product\SearchFilter;
use Illuminate\Pipeline\Pipeline;

class HomeController extends Controller
{
    public function index()
    {
        $products = app(Pipeline::class) //filters and search by pipeline
            ->send(Product::query())
            ->through([
                CategoryFilter::class,
                MinPriceFilter::class,
                MaxPriceFilter::class,
                SearchFilter::class,
            ])
            ->thenReturn()
            ->get();
        return view("home", compact('products')); // Return the view with the filtered or not filtered products
    }
}
