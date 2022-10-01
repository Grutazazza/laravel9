<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function basket(Request $request)
    {
        $products = null;
        if ($request->session()->has('basket')){
            $productId = $request->session()->get('basket');
            $productId = array_keys($productId);
            $products= Product::whereIn('id',$productId)->get();
        }
        $productId = $request->session()->get('basket');
        return view('users.order.basket',compact('products'));

    }


    public function addBasket(Request $request)
    {
        $basket = [];
        if($request->session()->has('basket'))
            $basket = $request->session()->get('basket');
        $basket[(int) $request->query('productId')]=1;
        $request->session()->put('basket',$basket);
        return back();
    }
}
