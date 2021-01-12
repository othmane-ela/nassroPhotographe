@extends('layouts.app')

@section('title','Shooting')


@section('extra-css')
 
@endsection

@section('content')
<section id="shooting_page" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 separate header-middle-bg  text-center">
                <h2>Shooting</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="{{route('shooting.reservation')}}" class="m-btn w-25">Shooting Résevation</a>
            </div>
        </div>
    </div>
</section>


<section id="show" class="bg-dark-primary">
    <div class="show-container">
        <div class="black-overlay"></div>
          <video src="{{asset('internalimg/shooting.mp4')}}" autoplay muted loop width="100%" height="100%"></video> 
      </div>
</section>

@endsection