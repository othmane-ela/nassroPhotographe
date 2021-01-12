@extends('layouts.app')


@section('title','Cadeaux')


@section('content')
<section id="cedeaux_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Idée Cadeau</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 text-center mt-3 mb-5 categories-inline d-none d-md-block  d-lg-block">
                <ul class="categories-inline-ul">
                    
                    @foreach ($categories as $category)
                    <li><a class="{{request()->category == $category->slug ? 'active' : ''}}" href="{{route('cadeaux.index',['category'=>$category->slug])}}">{{$category->name}}</a></li>
                    @endforeach 
                </ul>
            </div>

            <div class="col-md-12 text-left categories-drop d-md-none ">
                <div class="dropdown show p-3">
                    <a class="btn  white-c dark-bg dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ request()->category ? $categoryName : 'Categories'   }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{route('cadeaux.index',['category'=>$category->slug])}}">{{$category->name}}</a>
                        @endforeach                      
                    </div>
                </div>
            </div>

            @if (session()->has('success_message'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                </div>
            </div> 
            @endif


            @if (session()->has('errors'))
            <div class="col-md-12">
              <div class="alert alert-danger">
              {{session()->get('errors')}}
              </div>
            </div>
            @endif



            <!-- PRODUCTS -->
               <div class="col-md-12 separate text-center">
                <h2>{{$categoryName}}</h2>
            </div>
            @forelse ($products as $product)
            <div class="col-md-4 col-xs-6 mb-2">
                <div class="product">
                    <a href="{{route('cadeaux.show',$product->slug)}}">
                        <div class="product_img">
                            <img src="{{productImage($product->image)}}" alt="our product" width="100%">
                        </div>
                        <div class="product_details text-center">
                            <h4>{{$product->name}}</h4>
                            <p>{{$product->details}}</p>
                             <em>{{getPrice($product->price)}}</em>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <div class="text-center col-md-12 text-white">Aucun produit n'a été trouvé.</div>
            @endforelse
            <div class="col-md-12 my-3 ">
                {{$products->appends(request()->input())->links()}}
            </div>
        </div>
</section>
@endsection