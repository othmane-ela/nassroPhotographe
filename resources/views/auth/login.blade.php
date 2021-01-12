@extends('layouts.app')
@section('title','Se connecter')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 pt-2 separate text-center">
            <h2>Escpace Client</h2>
        </div>
    </div>
</div>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-2 text-center">
                <h4 class="text-center mb-4 text-light">login</h4>
                <div class="login-form dark-dark-bg">
                    <form method="POST" action="{{ route('login') }}" class="w-50 mx-auto">
                        @csrf
                      
                                <input id="email" type="email" class="my-in my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                     
                                <input id="password" type="password" class="my-in my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                       
                           
                           
                                    <div class="d-block my-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-light" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>

                                    </div>
                                 
                    
                                <button type="submit" class=" my-2 m-btn  text-center">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="mt-2" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif



                                <div class="text-center my-2 d-block">
                          
                                    <a class=" py-2 text-light font-weight-bold" href="{{ route('inviter.index') }}">
                                        Continuer en tant qu'invité ?
                                    </a>
                              
                                </div>

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
