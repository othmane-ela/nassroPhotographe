@extends('layouts.app')

@section('title','Panier')

@section('content')

@if (Cart::count() > 0)

<section id="cedeaux_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Panier</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            @if (session()->has('success_message'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                </div>
            </div> 
            @endif


            @if (session()->has('unsuccess_message'))
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{session()->get('unsuccess_message')}}
                </div>
            </div> 
            @endif

            @if (count($errors) > 0)
            <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach  
                </ul>
            </div>
            </div>
          @endif

        </div>
    </div>
</section>

        

<section class="cart">
    <div class="pb-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 p-5 bg-dark-secondary rounded shadow-sm mb-5">
    
              <!-- Shopping cart table -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-white">
                        <div class="p-2 px-3 text-uppercase">Produit</div>
                      </th>
                      <th scope="col" class="border-0 text-white">
                        <div class="py-2 text-uppercase">Prix</div>
                      </th>
                      <th scope="col" class="border-0 text-white">
                        <div class="py-2 text-uppercase">Supprimer</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach (Cart::content() as $item)
                        <tr>
                        <th scope="row" class="border-0">
                            <div class="p-2">
                              <img src="{{productImage($item->model->image)}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                              <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="{{route('personaliser.index',$item->model->slug)}}" class="text-white d-inline-block align-middle">{{$item->model->name}}</a>
                                  <span class="badge badge-secondary" style="background-color: {{$item->options->color_code}}">{{$item->options->color_name}}</span>
                                </h5>
                                <span class="text-muted font-weight-normal font-italic d-block">
                                 
                                    {{ Illuminate\Support\Str::limit($item->model->details,40) }}
                                </span>
                              </div>
                            </div>
                          </th>
                          <td class="border-0 text-white align-middle"><strong>{{getPrice($item->model->price)}}</strong></td>
                          <td class="border-0  align-middle">
                              <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-dark-secondary">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- End -->
            </div>
          </div>
    
          <div class="row py-5 p-4 bg-dark-secondary rounded shadow-sm">
            <div class="col-lg-6">
              <div class="bg-dark-primary rounded px-4 py-3 text-white text-uppercase font-weight-bold">Coupon code</div>
              <div class="p-4">
                <p class="font-italic mb-4 text-white">Si vous avez un code promo, veuillez le saisir dans la case ci-dessous</p>
                <form action="{{route('coupon.store')}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" name="coupon_code" id="coupon_code" class="my-in">
                    <button type="submit" class="m-btn ml-0 mt-2 mb-1">Appliqué Coupon code</button>
                </form>
              </div>
              <div class="bg-dark-primary rounded px-4 py-3 text-uppercase text-white font-weight-bold">
                Instructions pour le vendeur</div>
              <div class="p-4">
                <p class="font-italic mb-4 text-white">
                  Si vous avez des informations pour le vendeur, vous pouvez les laisser dans la case ci-dessous.</p>
                <textarea name="" cols="30" rows="2" class="my-in"></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="bg-dark-primary rounded px-4 py-3 text-uppercase text-white font-weight-bold">Récapitulatif de la commande </div>
              <div class="p-4">
                <p class="font-italic mb-4 text-white">
                  Les frais d'expédition et supplémentaires sont calculés en fonction des valeurs que vous avez saisies.</p>
                <ul class="list-unstyled mb-4">

              <li class="d-flex justify-content-between text-white py-3 border-bottom"><strong class="text-white">sous-total </strong><strong>{{getPrice(Cart::subtotal())}}</strong></li>
              @if (session()->has('coupon'))
              <li class="d-flex justify-content-between text-white py-3 border-bottom"><strong class="text-white">Remise ( {{session()->get('coupon')['name']}} )
              
                <form action="{{route('coupon.destroy')}}" method="POST" style="display: inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="border-0 bg-dark-secondary">
                      <i class="fa fa-trash text-danger"></i>
                  </button>
              </form>
              
              </strong><strong>-{{getPrice(session()->get('coupon')['discount']) }}</strong></li>
              <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Nouveau sous total</strong><strong>{{getPrice($newSubtotal)}}</strong></li>
              @endif
              <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Livraison</strong><strong>Gratuite</strong></li>
              <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Tax</strong><strong>{{getPrice($newTax)}}</strong></li>
              <li class="d-flex justify-content-between py-3 text-white border-bottom"><strong class="text-white">Total</strong>
                <h5 class="font-weight-bold">{{getPrice($newTotal)}}</h5>
              </li>
                </ul><a href="{{route('checkout.index')}}" class="m-btn ml-0 mt-2 w-100 mb-1">Confirmer</a>

              </div>
            </div>
          </div>
    
        </div>
      </div>
</section>
@else
<section id="cedeaux_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Panier est Vide</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="{{route('cadeaux.index')}}" class="m-btn mx-auto my-2 w-50"><i class="fas fa-long-arrow-alt-left mr-3"></i>Retour à la page des produits</a>

            </div>
        </div>
    </div>
</section>
@endif
@endsection