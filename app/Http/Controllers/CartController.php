<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    


            return view("cart.index")->with([
                'discount' => $this->getMoney()->get('discount'),
                'newSubtotal' =>$this->getMoney()->get('newSubtotal'),
                'newTax' => $this->getMoney()->get('newTax'),
                'newTotal' => $this->getMoney()->get('newTotal'),
            ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem,$rowId) use ($request){
            return $cartItem->id == $request->id;
        });

        if($duplicates->isNotEmpty())
        {
            return redirect()->route('cart.index')->with('success_message','Le produit à été déja ajouté ! ');
        }

        

        $product = Product::findOrFail($request->id);
        $ifIsRequired = "required";

        if($product->has_images == 0){
            $ifIsRequired = "nullable";
        }
       
        $request->validate([
            'color' => 'required',
            'images' => $ifIsRequired,
            'images.*' => 'image|mimes:png,jpeg,jpg|max:1024',
        ]);

    
        if($ifIsRequired == 'required' ){
            if($product->has_images != count($request->images)){
                return redirect()->back()->with('unsuccess_message','Le produit requis '.$product->has_images.' image (s)');
            }
        }
    

        $color = Color::findOrFail($request->color);
       $currentCart = Cart::add($product->id,$product->name,1,$product->price,['color_id'=>$color->id,'color_name'=>$color->name,'color_code'=>$color->code])
        ->associate('App\Product');
     


        if($product->has_images != 0){
            if($request->hasFile('images')){
        
                $myUnique = uniqid("",true);
                foreach($request->images as $image){
                    $imageName = $image->getClientOriginalName();
                    $imageExt = $image->getClientOriginalExtension();
                    $newName = uniqid("",true).'.'.$imageExt;
                
                    if (!File::exists(getClientPath().$currentCart->rowId.$myUnique)) {
                        File::makeDirectory(getClientPath().$currentCart->rowId.$myUnique);
                        $image->move(getClientPath().$currentCart->rowId.$myUnique,$newName);
                    }
                    else{
                        $image->move(getClientPath().$currentCart->rowId.$myUnique,$newName);
                    }
                  
                }
            }
        }
     

        return redirect()->route('cadeaux.index')->with('success_message','Le produit à bien été ajouté');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        File::deleteDirectory(getClientPath().$rowId);
        Cart::remove($rowId);
        return back()->with('success_message','Le produit à été bien supprimé');
    }


    private function getMoney()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = (Cart::subtotal() - $discount);
        if($newSubtotal < 0)
        {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;
        return collect([
            'discount' => $discount,
            'newSubtotal' =>$newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);

    }

    
}
