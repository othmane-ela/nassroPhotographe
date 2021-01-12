@extends('layouts.app')
@section('title','Creé un compte')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 pt-2 separate text-center">
            <h2>Soyez les bienvenu</h2>
        </div>
    </div>
</div>


<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-2 text-center">
                <h4 class="text-center mb-4 text-light">Créer un compte</h4>
                <div class="login-form dark-dark-bg">
                    <form method="POST" action="{{ route('register') }}" class="w-50 mx-auto">
                        @csrf

                                <input id="name" type="text" class="my-in my-2  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="votre nom">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           

                                <input id="email" type="email" class="my-in  my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="votre@email.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        
                                <input id="password" type="password" class="my-in my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              
                   
                                <input id="password-confirm" type="password" class="my-in my-2" name="password_confirmation" required autocomplete="new-password" placeholder="confimer le mot de passe">
                      
                                <button type="submit" class="m-btn my-2 ">
                                    {{ __('Créer') }}
                                </button>
                       
                    </form>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="login-img d-none d-xm-none d-sm-none d-md-block">
                    <img src="{{asset('internalimg/bg/bg_event.jpg')}}" class="rounded" width="100%">
                </div>
            </div>

        </div>
    </div>


</section>
@endsection
