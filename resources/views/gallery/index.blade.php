@extends('layouts.app')

@section('title','Gallery')

@section('content')
<section id="gallery_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Gallery</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="toolbar mb2 mt2 text-center">
            <button class="m-btn d-inline mr-2 mb-2 fil-cat" href="" data-rel="all">Tous</button>
            <button class="m-btn d-inline mr-2 mb-2 fil-cat" data-rel="web">Mariage</button>
            <button class="m-btn d-inline mr-2 mb-2 fil-cat" data-rel="flyers">Shooting</button>
            <button class="m-btn d-inline mr-2 mb-2 fil-cat" data-rel="bcards">Events</button>
          </div> 
           
          <div id="portfolio">
            <div class="tile scale-anm web all">
                  <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm bcards all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm flyers all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm bcards all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm flyers all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm flyers all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm flyers all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm bcards all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm bcards all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div> 
            <div class="tile scale-anm web all">
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div> 
            <div class="tile scale-anm bcards all">     
                <img src="{{asset('internalimg/bg/bg-4.jpg')}}" alt="" />
            </div>
          </div>
          
          <div style="clear:both;"></div>   
    </div>
</section>

@endsection

@section('gallery-js')
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script>
      $(function () {
      var selectedClass = "";
      $(".fil-cat").click(function () {
          selectedClass = $(this).attr("data-rel");
          $("#portfolio").fadeTo(100, 0.1);
          $("#portfolio div")
          .not("." + selectedClass)
          .fadeOut()
          .removeClass("scale-anm");
          setTimeout(function () {
          $("." + selectedClass)
              .fadeIn()
              .addClass("scale-anm");
          $("#portfolio").fadeTo(300, 1);
          }, 300);
      });
      });

</script>    
@endsection