@extends('layouts.app')

@section('title','Studio')

@section('content')
        
<section id="studio_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Studio</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="hover14 ">
                    <div>
                        <figure>
                            <div class="black-overlay text-white">
                                <h3>Photo Studio</h2>
                                <p class="text-center px-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa optio natus sunt.</p>
                            <a href="{{route('studio.format')}}" class="m-btn text-center">Les formats<i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                            <img src="internalimg/studio/studio1.jpg" width="100%" />
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="hover14 ">
                    <div>
                        <figure>
                            <div class="black-overlay text-white">
                                <h3>Print Photos</h2>
                                <p class="text-center px-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa optio natus sunt.</p>
                            <a href="{{route('studio.print')}}" class="m-btn text-center">Printer<i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                            <img src="internalimg/studio/studio2.jpg" width="100%" />
                        </figure>
    
                    </div>
                </div>
            </div>
        </div>
    
    </div>
        
</section>
@endsection 