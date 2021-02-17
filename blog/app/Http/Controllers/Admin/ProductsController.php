<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index', ['products' => $products]);
    }
    
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }
}
