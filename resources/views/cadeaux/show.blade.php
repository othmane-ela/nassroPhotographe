@extends('layouts.app')

@section('title',$product->name)


@section('extra-meta')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />@endsection




@section('extra-css')
<style>
  .dropzoneDragArea input{
    background-color: rgb(26, 26, 26);
    border: 1px dashed #818181;
    border-radius: 6px;
    padding: 60px;
    text-align: center;
    margin-bottom: 15px;
    cursor: pointer;
  }

</style>    
@endsection



@section('content')

<section>
    <div class="container">
        <div class="row">

          <div class="col-md-12 separate text-center">
            <h2>Produit</h2>
            <p class="text-capitalize text-white">{{$product->name}}</p>
        </div>

          <div class="col-md-12 mb-4">

            @if (session()->has('unsuccess_message'))
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{session()->get('unsuccess_message')}}
                </div>
            </div> 
            @endif



            @if($errors->any())
            <div id="error-box">
             @foreach ($errors->all() as $error)
             <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
             - {!! $error !!}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             </div>
             @endforeach
            </div>
          @endif  
          </div>
            <div class="col-md-6 pb-5">
                <div class="product-img">
                 <div id="carouselExampleControls" class="carousel slide bg-dark-secondary shadow-sm" data-ride="carousel">
                     <div class="carousel-inner">
                       <div class="carousel-item active">
                       <img class="d-block w-100" src="{{productImage($product->image)}}" alt="product">
                       </div>
                       @foreach (json_decode($product->images,true) as $image)
                       <div class="carousel-item">
                        <img class="d-block w-100" src="{{productImage($image)}}" alt="Second slide">
                      </div>
                       @endforeach  
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                       <i aria-hidden="true" class="fas fa-caret-left text-dark"></i>
                       <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                         <i aria-hidden="true" class="fas fa-caret-right text-dark"></i>                         
                       <span class="sr-only">Next</span>
                     </a>
                   </div>
                </div>
                <div class="col my-2">
                  @foreach (json_decode($product->images,true) as $image)
                  <img src="{{productImage($image)}}" alt="product" class="mr-1 mb-2 old-img" width="20%" height="20%">
                  @endforeach
                </div>
            </div>

            <div class="col-md-6">
                    <div class="product_details py-5  text-white">   {!! $stockLevel !!}
                    <h2 class="py-2">{{$product->name}} <span class="product-show-desc">{{$product->details}}</span> <h2>
                   
                    <h3 class="py-2"><em>{{getPrice($product->price)}}</em></h3> 
                 
                    @if ($product->quantity > 0)
                    <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data" >
                      @csrf
                      <div class="product-color w-25">
                            <select name="color" class="my-in my-2" aria-placeholder="Couleur">
                              @foreach ($colors as $color)
                              <option value="{{$color->id}}">{{$color->name}}</option>
                              @endforeach
                            </select>
                      </div>
                    
                        @if (!$product->has_images == 0)
                        <div> 
                          <h3 class="py-2">Personalisé votre Cadeau</h3>
                          <p class="text-warning">* Le produit requis {{$product->has_images}} image (s)</p>
                        </div>
                        <div class="dropzoneDragArea my-3">
                          <input type="file" name="images[]" multiple  class="form-controle">
                        </div>
                        @endif
  
                          <input type="text" name="id" value="{{$product->id}}" hidden>
                          <button type="submit" class="m-btn ml-0 my-3 w-50">Ajouter au panier <i class="fas text-white fa-shopping-bag"></i></button>
                      </form>
                     @endif
                     <p><span class="font-weight-bold"></span>{{$product->description}}</p>
                </div>
           </div>
          
        </div>
    </div>
   
</section>

<section class="liked_product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5 class="font-weight-bold text-white text-uppercase">Vous pourriez aussi aimer</h5>
      </div>
          <!-- PRODUCTS -->
          @foreach ($likedPorducts as $likedProduct)
          <div class="col-md-4 col-xs-6 my-2">
              <div class="product">
                  <a href="{{route('cadeaux.show',$likedProduct->slug)}}">
                      <div class="product_img">
                          <img src="{{productImage($likedProduct->image)}}" alt="our product" width="100%">
                      </div>
                      <div class="product_details text-center">
                          <h4>{{$likedProduct->name}}</h4>
                          <p>{{$likedProduct->details}}</p>
                           <em>{{getPrice($likedProduct->price)}}</em>
                      </div>
                  </a>
              </div>
          </div>
          @endforeach
    </div>
  </div>
</section>

@endsection


@section('extra-js')

@endsection