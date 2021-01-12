@extends('layouts.app')

@section('title','Mariage')


@section('content')

<section class="mariage">
    <div class="black-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 separate header-middle-bg text-center">
                <h2 class="">Mariage</h2>
                <p class="text-uppercase">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit consectetur. </p>
                <a href="#packs" class="m-btn mx-auto my-2 w-25"><i class="fas fa-long-arrow-alt-down mr-3"></i>Découvrire</a>
            </div>
        </div>
    </div>
</section>  
<section class="packs" id="packs">
    <div class="container">
        @foreach ($packs as $pack)
        <div class="row py-5">
            <div class="col-md-6">
                <h4 class="text-white">{{$pack->pack}}</h4>
                <p class="text-light">{!! $pack->description !!}</p>
                <a href="{{route('mariage.reservation')}}" class="m-btn ml-0">Réservé<i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
          <div class="col-md-6 p-3">
            @foreach (json_decode($pack->images,true) as $image)
            <img src="{{asset('storage/'.$image)}}" class="old-img" alt="Photo de service le plus récommandé" width="50%">
            @endforeach
          </div>
        </div>
        @endforeach
    </div>
  
</section>

@endsection