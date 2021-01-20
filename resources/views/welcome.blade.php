@extends('layouts.app')

@section('title','Accauil')


@section('owl.cdn')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />
@endsection

@section('content')

<section id="services">
<div class="container">
    <div class="row">
        <div class="col-md-12 separate text-center">
            <h2>Nos Services</h2>
            <p class="text-uppercase">Soyez les bienvenus</p>
        </div>
    </div>
</div>   

        <!--Carousel Wrapper-->       
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1" class=""></li>
        <li data-target="#multi-item-example" data-slide-to="2" class=""></li>
      </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-4">
                <div class="news-card">
                    <a href="{{route('shooting.index')}}" class="news-card__card-link"></a>
                    <img src="https://images.unsplash.com/photo-1511150614563-600e6dc2c887?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80
                    " alt="" class="news-card__image">
                    <div class="black-overlay"></div>
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">Shooting</h2>
                        <div class="news-card__post-p">Lorem ipsum dolor sit amet consectetur ...</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
                             <a href="{{route('shooting.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
          </div>

          <div class="col-md-4 clearfix d-none d-md-block">
                <div class="news-card">
                    <a href="{{route('studio.index')}}" class="news-card__card-link"></a>
                    <img src="https://images.unsplash.com/photo-1496559249665-c7e2874707ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="" class="news-card__image">
                    <div class="black-overlay"></div>
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">Studio</h2>
                        <div class="news-card__post-p">Lorem ipsum dolor sit amet consectetur ...</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
                        <a href="{{route('studio.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
          </div>

          <div class="col-md-4 clearfix d-none d-md-block">
                <div class="news-card">
                    <a href="{{route('cadeaux.index')}}" class="news-card__card-link"></a>
                    <img src="https://images.unsplash.com/photo-1592903297149-37fb25202dfa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=716&q=80" alt="" class="news-card__image">
                    <div class="black-overlay"></div>
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">Idée Cadeau</h2>
                        <div class="news-card__post-p">Lorem ipsum dolor sit amet consectetur ...</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
                        <a href="{{route('cadeaux.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!--/.First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-4">
                <div class="news-card">
                    <a href="{{route('event.index')}}" class="news-card__card-link"></a>
                    <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" class="news-card__image">
                    <div class="black-overlay"></div>
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">Èvenement</h2>
                        <div class="news-card__post-p">Lorem ipsum dolor sit amet consectetur ...</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
                        <a href="{{route('event.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

          <div class="col-md-4 clearfix d-none d-md-block">
                <div class="news-card">
                    <a href="{{route('mariage.index')}}" class="news-card__card-link"></a>
                    <img src="https://images.unsplash.com/photo-1586695924412-42a045c492eb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=668&q=80" alt="" class="news-card__image">
                    <div class="black-overlay"></div>
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">Mariage</h2>
                        <div class="news-card__post-p">Lorem ipsum dolor sit amet consectetur ...</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
                        <a href="{{route('mariage.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
          </div>

          <div class="col-md-4 clearfix d-none d-md-block">
                <div class="news-card">
                    <a href="{{route('shooting.index')}}" class="news-card__card-link"></a>
                    <img src="https://images.unsplash.com/photo-1576743962824-171cdf11bcd9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80" alt="" class="news-card__image">
                    <div class="black-overlay"></div>
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">Shooting</h2>
                        <div class="news-card__post-p">Lorem ipsum dolor sit amet consectetur ...</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
                            <a href="{{route('shooting.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
 
    </div>
   
    <!--/.Slides-->
     <!--Controls-->
    <a class="carousel-control-prev" href="#multi-item-example" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#multi-item-example" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
      <!--/.Carousel Wrapper-->
</section>

<section id="recommanded-service" class="bg-dark-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                      <h4 class="text-white">Idée Cadeau</h4>
                      <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, consectetur! Unde nesciunt, autem quisquam eius voluptatibus, at vero animi similique consequuntur delectus minima reiciendis iure asperiores repudiandae ipsum soluta cum!</p>
                      <a href="http://127.0.0.1:8000/cadeaux/Tass-Magic" class="m-btn ml-0">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
                <div class="col-md-3 p-3">
                <img src="https://images.unsplash.com/photo-1545080633-2749c77202ea?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" class="old-img" alt="Photo de service le plus récommandé" width="50%">
                 <img src="https://images.unsplash.com/photo-1607172318768-b3dc211e5ba7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80
                 " class="old-img-two" alt="Photo de service le plus récommandé" width="50%">
                </div>
            </div>
        </div>
</section>


<section id="products_last">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12 separate text-center">
                <h2>Nos Produits</h2>
                <h3 class="text-uppercase text-white">exclusivité -50% sur nos produits pour le Nöel</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 my-2 mx-auto shadow-sm">
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
            @endforeach
            <div class="col-md-12 my-2">
                <a href="{{route('cadeaux.index')}}" class="m-btn">Voir Plus<i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
</section>


<section id="testimonials" class="bg-dark-secondary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Témoignage</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row pt-2 pb-4">
            @foreach ($testimonails as $testimonail)
            <div class="col-lg-4 mb-2 ">
                <div class="testimonial bg-dark-primary mx-auto text-white">
                    <div class="testi_icon d-block text-right p-3">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testi_img d-block text-center py-2">
                        <img src="{{productImage($testimonail->image)}}" alt="testimonial image" class="rounded-circle border-1 mx-auto" width="50">
                    </div>
                    <div class="testi_details text-center py-2">
                        <h4><em>{{$testimonail->name}}</em></h4>
                        <p class="p-2 mx-auto">{{$testimonail->message}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
      

@endsection
       


