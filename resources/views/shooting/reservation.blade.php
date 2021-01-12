@extends('layouts.app')


@section('title','Reservation')


@section('content')


        
<section id="shooting_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Shooting (Reservation)</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</section>


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

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-white">
                <h5 class="text-center">Information</h5>
                <table class="text-left mx-auto">
                    <tbody>
                        <tr>
                            <th scope=" row">Local</th>
                            <td class="text-center">Adresse 101 street 3</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>contact@shooting.com</td>
                        </tr>
                        <tr>
                            <th scope="row">Horaire</th>
                            <td>10:00 am to 5:00 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">Télephone</th>
                            <td  class="text-center">05 76 36 98 76</td>
                        </tr>
                    </tbody>
                </table>                
            </div>
            <div class="col-md-9 rounded shadow-sm p-3 my-4 bg-dark-secondary">
                    <h4 class="text-center text-white py-3"><i class="fab text-white fas fa-camera-retro"></i><br>Shooting Reservation Formulaire</h4>
                    <p class="text-muted text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque error, unde quibusdam ipsam vitae quasi maiores officia impedit inventore sed, dolores dolor animi. Culpa, animi officia. Veniam possimus dicta sunt?</p>
                    <form action="{{route('shooting.store')}}" method="POST" class="text-center">
                        @csrf
                            <input type="text" class="my-in w-50  my-2 " name="nom" placeholder="Nom" value="{{old('nom')}}">
                            <input type="text" class="my-in w-50 my-2 " name="prenom" placeholder="Prenom" value="{{old('prenom')}}">
                            <input type="date" class="my-in w-50 my-2" id="datePicker" name="seance_date" value="{{old('seance_date')}}">
                            <input type="email" class="my-in w-50 my-2" name="email" placeholder="email" value="{{old('email')}} ">
                            <input type="tell" class="my-in w-50 my-2" name="phone" placeholder="Téléphone" value="{{old('phone')}}">
                            <button type="submit" class="m-btn mx-auto my-2 mb-1">Reservé</button>        
                    </form>
            </div>
        </div>
    </div>
</section>


@endsection