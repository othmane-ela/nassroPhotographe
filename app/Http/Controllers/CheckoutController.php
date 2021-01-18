<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use App\Region;
use App\Product;
use App\OrderProduct;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CommandRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count() <=0)
        {
            return redirect()->route('cadeaux.index');
        }

        if(auth()->user() && request()->is('inviter')){
            return redirect()->route('checkout.index');
        }

        return view("checkout.index")->with([
            'discount' => $this->getMoney()->get('discount'),
            'newSubtotal' =>$this->getMoney()->get('newSubtotal'),
            'newTax' => $this->getMoney()->get('newTax'),
            'newTotal' => $this->getMoney()->get('newTotal'),
        ]);
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
    public function store(CommandRequest $request)
    {
        if($this->productsAreNoLongerAvailable())
        {
            return redirect()->route('cadeaux.index')->with('errors',"Pardon ! L'un des articles de votre panier n'est plus disponible");
        }

        $city = City::where('id',$request->city)->firstOrFail();
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'country' => 'MA',
            'billing_address' => $request->adresse,
            'billing_city' => $city->ville,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->code,
            'billing_phone'=> $request->phone,
           'billing_discount' => $this->getMoney()->get('discount'),
            'billing_discount_code' => $this->getMoney()->get('code'),
            'billing_subtotal' => $this->getMoney()->get('newSubtotal'),
            'billing_tax' =>  $this->getMoney()->get('newTax'),
           'billing_total' => $this->getMoney()->get('newTotal'),
           'error' => null
        ]);



        // GET CLIENT  IMAGES 

        foreach(Cart::content() as $item)
        {
                 $clientImages = array();
                if(File::exists(getClientPath().$item->client_path_img)) {

                    $clientImages = scandir(getClientPath().$item->client_path_img);
                    $clientImages = array_splice($clientImages,2,count($clientImages));
                    if (!File::exists(public_path().'/storage/orders/'.$item->client_path_img)){
                        File::makeDirectory(public_path().'/storage/orders/'.$item->client_path_img);
                        foreach($clientImages as $img)
                        {
                            rename(getClientPath().$item->client_path_img.'/'.$img,public_path().'/storage/orders/'.$item->client_path_img.'/'.$img);
                        }

                        File::deleteDirectory(getClientPath().$item->client_path_img);
                    }
                 
                }
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'folder_id' => $item->client_path_img,
                    'color' => $item->options->color_name,
                    'client_images' => json_encode($clientImages)
                ]);
        }

    
        Mail::send(new OrderPlaced($order));
        $this->decreaseQauntities();
        Cart::destroy();

       return redirect()->route('thankyou.index')->with('confirmed','merci votre command a été bien passé');
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
    public function destroy($id)
    {
        //
    }


    public function getRegion(Request $request,$regionId)
    {
        $validator = Validator::make($request->all(),[
            'regionId' => 'required|numeric'
        ]);

        if($validator->fails()){
            session()->flash('errors','région non trouvée');
            return response()->json(['success',false],400);
        }

       $region = Region::where('id',$request->regionId)->firstOrFail();

       $responsecode = 200;
       
       $header = array (
               'Content-Type' => 'application/json; charset=UTF-8',
               'charset' => 'utf-8'
           );
       
       return response()->json($region , $responsecode, $header, JSON_UNESCAPED_UNICODE);
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
            'code '=> $code,
            'discount' => $discount,
            'newSubtotal' =>$newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);

    }

    protected function decreaseQauntities()
    {
        foreach(Cart::content() as $item)
        {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach(Cart::content() as $item)
        {
            $product = Product::find($item->model->id);
            if($product->quantity < $item->qty)
            {
                return true;
            }

            return false;
           
        }
    }
}
