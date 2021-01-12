@extends('layouts.app')

@section('title','Fromats')

@section('content')
        
<section id="studio_page" class="bg-dark-primary">
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12 separate text-center">
                <h2>Studio (Photo Formats)</h2>
                <p class="text-uppercase text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <table class="table table-striped dark-dark-bg text-center">
            <thead>
                    <tr class="text-white">
                        <th scope="col">Type de la photo</th>
                        <th scope="col">Nombre des photos</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">taille de la photo</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Description</th>
                      </tr>
            </thead>
            <tbody>
                @foreach ($formats as $format)
                <tr class="text-light">
                    <td>{{$format->photo_type}}</td>
                    <td>{{$format->nombres_photos}}</td>
                    <td>{{$format->categorie}}</td>
                    <td>{{$format->taille_photo}}</td>
                    <td>{{$format->prix}}</td>
                    <td>{{$format->description}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
</section>


@endsection