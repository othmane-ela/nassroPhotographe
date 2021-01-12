@extends('layouts.app')
@section('title','Mes Commandes')
@section('content')


<section class="products_main">
    <div class="container ">

        <div class="row py-4">
            <div class="col col-md-3 bg-dark-secondary rounded  py-5 ">
                <ul class="list-group list-group-flush m-0 p-0">
          
                          <li class="list-group-item  bg-dark-secondary text-left"><a href="{{route('users.edit')}}" class="link ">Mon Profile</a></li>
                           <li class="list-group-item  bg-dark-secondary text-left"><a href="{{route('orders.index')}}" class="link isactive">Mes Commandes</a></li>
                    
                </ul>
            </div>

            <div class="col-md-9">

                @if (session()->has('success_message'))
               
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{session()->get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                @endif


                <h5 class="text-light font-weight-bold p-3 text-left bg-dark-secondary">Mes Commandes</h5>
                <div class="row">
                  <div class="col-sm-12 my-3">
                    @foreach ($orders as $order)


                    <ul class="navbar-nav my-3">   
                      <li class="nav-item text-uppercase shadow-sm bg-dark-secondary py-4 px-2 text-center">
                        <div class="row">
                          <div class="col">
                            <i class="fas fa-file-invoice-dollar text-light pr-2 font-weight-bold"></i><span class="font-weight-bold text-light">commande placé</span>
                          </div>
                          <div class="col text-light">
                            COMMANDE N° {{$order->id}} 
                          </div>
                          <div class="col text-light">
                            TOTAL {{getPrice($order->billing_total)}} 
                          </div>
                          <div class="col">
                            <a href="{{route('orders.show',$order->id)}}" class="m-btn">Plus détails</a>  
                          </div> 
                        </div>                           
                      </li>
                    </ul>
                    <table class="table table-hover borderless">
                      <tbody>
                        @foreach ($order->products as $product)
                       
                          <tr class="text-light" style="border-spacing: 2px;">
                            <td> <a href="{{route('cadeaux.show',$product->slug)}}"><img src="{{productImage($product->image,$product->fromApi)}}" alt="product image" width="100" height="100">  </a></td>
                            <td>{{$product->name}} <br> {{getPrice($product->public_price)}} <br> {{$product->pivot->quantity}}</td>
                            <td>Shipped (Status) <br>
                            
                            @if ($order->shipped)
                            <span class="badge badge-pill badge-success">Livré</span>
                            @else
                            <span class="badge badge-pill badge-secondary">Sous traitment</span>
  
                            @endif
                           
                            </td>
                            <td></td>
                          </tr>
                        
                      
                      
                      @endforeach
                      </tbody>
                    </table>
                    @endforeach

                 
                </div>
                <div class="my-3 col-md-12 ">
                  <div class="">
                    {{$orders->appends(request()->input())->links()}}
                  </div>
              </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

