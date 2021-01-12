<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(3)->get();  
        return view('welcome')->with('products',$products);
    }
}
