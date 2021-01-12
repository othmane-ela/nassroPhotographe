@extends('layouts.app')


@section('title','Contact')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 pt-2 separate text-center">
            <h2>Contact</h2>
        </div>
    </div>
</div>


@if (count($errors) > 0)
<div class="container">
<div class="row">
    <div class="col-md-12 my-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach  
        </ul>
    </div>
    </div>
</div>
</div>
  @endif

  @if (session()->has('success_message'))
  <div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
  <div class="col-md-12">
      <div class="alert alert-success">
          {{session()->get('success_message')}}
      </div>
  </div> 
        </div>
    </div>
  </div>
  @endif



<section id="contact">
    <div class="container">
        <form action="{{route('contact.store')}}" method="POST">
        <div class="row">
            @csrf
           <div class="col-md-12 text-center">
            <h4 class="text-white">Contactez nous</h4>
           </div>
        
            <div class="col-md-6 mt-4 ">
                <input type="text" class="my-in" name="nom" placeholder="Le nom">
            </div>


               <div class="col-md-6 mt-4">
                <input type="email" class="my-in" name="email" placeholder="email@email.com">
               </div>


               <div class="col-md-12 mt-4">
               <textarea class="my-in" name="message" id="" cols="100%" rows="10" placeholder="message ..."></textarea>
               </div>

               <div class="col-md-12 text-center mt-2">
                    
                     <button type="submit"  class="m-btn text-cente">Envoyer</button>
               </div>
          
          
        </div>
    </form>
  
    </div>
  
  

</section>
    
@endsection