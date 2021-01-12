@extends('layouts.app')
@section('title','Merci')
@section('content')
 <div class="container" style="height: 60vh">
 <div class="row">
          <div class="col-md-12 separate text-center">
                    <h2>Merci</h2>
                    <p class="text-uppercase text-light">Votre Commande a bien été prise en compte !</p>
                    <p class="text-light mb-2">un email de confirmation a été envoyé</p>
                    <a href="{{route('cadeaux.index')}}" class="m-btn w-25">Retour à la liste des produits <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
 </div>
 </div>

@endsection