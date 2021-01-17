<?php

namespace App\Http\Controllers;

use session;
use App\Product;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Gloudemans\Shoppingcart\Facades\Cart;

class PersonalizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();

        $product_on_cart = Cart::search(function($cartItem,$rowId) use ($product){
            return $cartItem->id == $product->id;
        });

     
        if($product_on_cart->isNotEmpty())
        {   
            $product_on_cart = $product_on_cart->first();

         
            
            if(File::exists(getClientPath().$product_on_cart->client_path_img)) {
             
                $clientImages = scandir(getClientPath().$product_on_cart->client_path_img);
               $clientImages = array_splice($clientImages,2,count($clientImages));
            
               
            return view('personaliser.index')->with([
                'product' => $product_on_cart,
                'images' => $clientImages
                ]);
             
            }   

            return view('personaliser.index')->with([
                'product' => $product_on_cart,
                'images' => []
                ]);
        }

         return redirect()->route('cadeaux.index');


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

    public function imageLoader(Request $request)
    {
       $images = Collection::wrap(request()->file('file'));
        session()->put('images',$images);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request, $rowId)
    {
        $cart_id = session('cart_id');
        File::deleteDirectory(getClientPath().$rowId.$cart_id);
        Cart::remove($rowId);
        session()->forget('cart_id');
         return redirect()->route('cadeaux.show',$request->slug);
    }
}
