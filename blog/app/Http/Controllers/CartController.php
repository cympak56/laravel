<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Good;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }
	
	public function order()
    {
        if (is_null(session('cart'))) {
            return redirect()->route('home');
        }
		
		$order = new Order;
		$order->user_id = Auth::id();
		$order->save();
		
		foreach(session('cart') as $product){
			$good = new Good;
			$good->title = $product['title'];
			$good->price = $product['price'];
			$good->order_id = $order->id;
			$good->save();
		}
		
		session()->put('cart', null);

        return view('complete');

    }
}
