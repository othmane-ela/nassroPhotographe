@extends('layouts.app')

@section('title','Personalisez')
@section('content')

@if (Cart::count() > 0)


        <section class="personalize">
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-12 separate text-center">
                        <h2>Personalisez votre produit</h2>
                        <p class="text-capitalize text-white">{{$product->model->name}}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="black-overlay"></div>
                        <img src="{{productImage($product->model->image)}}" class="rounded shadow-sm" alt="our product" width="100%">
                    </div>
                    <div class="col-md-6">
                        <div class="product_details py-5  text-white">
                        <h2 class="py-2">{{$product->model->name}} <span class="product-show-desc">{{$product->model->details}}</span><h2>
                        <h3 class="py-2">{{getPrice($product->model->price)}}</h3> 
                            <div class="product-color w-25 pb-2">
                                <span class="py-2">Couleur Choisi : <span> {{$product->options->color_name}}</span></span>
                            </div>
                            
                        @if ($product->model->has_images > 0)
                        <hr>
                            <h3 class="py-2">Mes Photos </h3>
                        <hr>
                        <div class="col clearfix">
                            @foreach ($images as $image)
                            <img src="{{productImage('clts_images/'.$product->client_path_img.'/'.$image)}}" alt="product" class="mr-1 mb-2 old-img" width="20%" height="20%">
                            @endforeach
                        </div>
                       <div class="col my-3">
                        <form action="{{route('personaliser.destroy',$product->rowId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="slug" value="{{$product->model->slug}}">
                            <button type="submit" class="m-btn w-50">
                                <i class="fa fa-trash text-danger px-2"></i> Suprimer mes Photos
                            </button>
                        </form>
                       </div>
                       @endif
                         <p><span class="font-weight-bold"></span>{{$product->description}}</p>
                    </div>
               </div>
                </div>
            </div>
        </section>

@endif
@endsection