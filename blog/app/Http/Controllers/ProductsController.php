<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index($id)
    {
        $products = Product::query()->where('category_id', '=', $id)->paginate(6);
        return view('home', [
            'products' => $products,
            'category' => Category::find($id)
        ]);
    }
}
