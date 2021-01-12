@extends('layouts.app')
@section('title','Ma Commande')
@section('content')


<section class="products_main">
    <div class="container ">
        <div class="row py-4">
            <div class="col col-md-3 bg-dar-secaondary rounded  py-5 ">
                <ul class="list-group list-group-flush m-0 p-0">
                          <li class="list-group-item bg-dark-secondary text-left"><a href="{{route('users.edit')}}" class="link ">Mon Profile</a></li>
                          <li class="list-group-item bg-dark-secondary text-left"><a href="{{route('orders.index')}}" class="link isactive">Mes Commandes</a></li>
                </ul>
            </div>

            <div class="col-md-9">

              @if($errors->any())
               <div id="error-box">
                      @foreach ($errors->all() as $error)
                      <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                      - {!! $error !!}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      @endforeach
              </div>
             @endif 
              <div class="row">
                  <div class="col">
                    <h5 class="text-light font-weight-bold p-3 text-left bg-dark-secondary">Détails de la commande</h5>
                       
                        <ul class="navbar-nav bg-dark-secondary shadow-sm my-3 p-2">
                            <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Commande N° : </span>{{$order->id}}</li>
                            <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Methode paiement : </span>  a la livraison</li>
                            <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Date de commande : </span> {{$order->created_at}}</li>
                            <li class="nav-item font-weight-bold  text-light"><span class="text-muted font-weight-bold">Soustotal : </span> {{getPrice($order->billing_subtotal)}}</li>
                            <li class="nav-item font-weight-bold  text-light"><span class="text-muted font-weight-bold">Tax : </span> {{getPrice($order->billing_tax)}}</li>
                            <li class="nav-item font-weight-bold text-light"><span class="text-muted font-weight-bold">Total : </span>{{getPrice($order->billing_total)}}</li>
                        </ul>
                  </div>
                  <div class="col">
                    <h5 class="text-light font-weight-bold p-3 text-left bg-dark-secondary">Adresse de livraison</h5>
                    <ul class="navbar-nav bg-dark-secondary shadow-sm my-3 p-2">
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Nom de facturation : </span> {{$order->billing_name}}</li>
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Email : </span>{{$order->billing_email}} </li>
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Adresse : </span>{{$order->billing_adress}}</li>
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Ville : </span>{{$order->billing_city}}</li>
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Province : </span>{{$order->billing_province}}</li>
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Code postal : </span>{{$order->billing_postalcode}}</li>
                        <li class="nav-item  font-weight-bold  text-light"><span class="text-muted font-weight-bold">Téléphone portable :</span> {{$order->billing_phone}}</li>
                    </ul>

                </div>
              </div>
              <h5 class="text-light font-weight-bold p-3 text-left bg-dark-secondary">Contenu de ma commande</h5>
              <table class="table table-hover">
                  <thead>
                      <tr>
                        <td class="text-light">
                            Produit
                        </td>
                        <td class="text-light">
                           Couleur
                        </td>
                        <td class="text-light">
                            Mes images
                        </td>
                        <td class="text-light">
                            Prix Par unité
                        </td>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                      <tr class="text-light">
                          <td>
                              <a href="{{route('cadeaux.show',$product->slug)}}" class="link">
                                <div>{{$product->name}}</div>
                                <div><img src="{{productImage($product->image)}}" alt="product image" width="150"></div>
                              </a>
                        </td> 
                            <td>
                                {{$product->pivot->color}}
                            </td>
                            <td>
                                @if ($product->has_images > 0)

                                    @foreach ( json_decode($product->pivot->client_images) as $item)
                                   
                                            <img src="{{productImage('orders/'.$product->pivot->folder_id.'/'.$item)}}" alt="Client image" width="100" height="100">
                                    
                                    @endforeach
                      
                                @endif
                            </td>
                          <td>
                            <div>{{getPrice($product->price)}}</div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
             
            </div>
        </div>
    </div>
</section>



@endsection

