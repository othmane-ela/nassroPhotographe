@extends('layouts.app')
@section('title','Mon Compte')
@section('content')


<section class="products_main">
    <div class="container ">

        <div class="row py-4">
            <div class="col col-md-3 bg-dark-secondary rounded  py-5 ">
                <ul class="list-group list-group-flush m-0 p-0">
                    <li class="list-group-item text-left bg-dark-secondary"><a href="{{route('users.edit')}}" class="link isactive">Mon Profile</a></li>
                    <li class="list-group-item text-left bg-dark-secondary"><a href="{{route('orders.index')}}" class="link">Mes Commandes</a></li>
                </ul>
            </div>

            <div class="col-md-9">

                @if (session()->has('success_message'))
               
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{session()->get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                @endif


              <h5 class="text-light font-weight-bold p-3 text-left bg-dark-secondary">Mon Profile</h5>
                <div class="row">
                  <div class="col-sm-12 my-3">
                    <div class="users_edit bg-dakr-secondary rounded ">
                    <form class="" method="POST" action="{{route('users.update')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-8 mx-auto ml-0">
                                    <input id="name" type="text" class="my-in @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus placeholder="Nom">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-md-8 mx-auto ml-0">
                                    <input id="email" type="email" class="my-in @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email" placeholder="Email adresse">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-8 mx-auto ml-0">
                                    <span class="text-muted pt-2">laissez le mot de passe vide pour conserver le mot de passe actuel</span>

                                    <input id="password" type="password" class="my-in @error('password') is-invalid @enderror" name="password"  placeholder="Mot de passe">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-8 ml-0 mx-auto">
                                    <input id="password-confirm" type="password" class="my-in" name="password_confirmation"  placeholder="Confirmer le mot de passe">
                                </div>
                            </div>
    
                            <div class="form-group  row mb-0">
                                <button type="submit" class="m-btn w-50 mx-auto ml-3">
                                    {{ __('Modifer mes information') }}
                                </button>
                        </div>
                
                        </form>    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

