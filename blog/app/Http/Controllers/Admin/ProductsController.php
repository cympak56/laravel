<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        
        return view('admin.products.index', compact('products'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
        
        Product::create($request->all());
        
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
        
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();
        
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
