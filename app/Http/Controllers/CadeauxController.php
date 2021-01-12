<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CadeauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $categories = Category::all();
        $pagination= 6;
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug',request()->category);
            })->orderBy('created_at','DESC')->paginate($pagination);

            $categoryName = optional($categories->where('slug',request()->category)->first())->name;
        }
        else{
            $products = Product::with('categories')->orderBy('created_at','DESC')->paginate($pagination);
          
            $categoryName = 'Les derniers produits ajoutés';
        }
    
        return view('cadeaux.index')->with(['products'=>$products,'categories'=>$categories,'categoryName'=>$categoryName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $likedPorducts = Product::where('slug','!=',$slug)->inRandomOrder()->take(3)->get();

        $colors = Color::with('products')->whereHas('products',function($query) use ($product){
            $query->where('product_id',$product->id);
        })->get();

        $stockLevel = getStock($product->quantity);

        return view('cadeaux.show')->with([
            'product' => $product,
            'colors' => $colors,
            'likedPorducts' => $likedPorducts,
            'stockLevel' => $stockLevel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
