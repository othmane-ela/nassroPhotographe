<?php

namespace App\Http\Controllers;

use App\Product;
use App\Testimonial;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $testimonails = Testimonial::inRandomOrder()->take(3)->get();
        $products = Product::inRandomOrder()->take(3)->get();  
        return view('welcome')->with([
            'products'=>$products,
            'testimonails' => $testimonails
        ]);
    }
}
