@extends('layouts.app')
@section('title','réinitialiser le mot de passe')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 my-5 shadow-sm rounded bg-dark-secondary ">
      
                
                <div class=" text-center text-light font-weight-bold pt-4 "> {{ __('réinitialiser le mot de passe') }}</div>


                <div class="">
                    <form method="POST" action="{{ route('password.update') }}" class="text-muted px-2 py-4">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 text-light col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="my-in @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 text-light col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="my-in @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 text-light col-form-label text-md-right">{{ __('Confirmer Le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="my-in" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="text-center d-block">
                                              
                            <button type="submit" class="m-btn">
                                {{ __('réinitialiser') }}
                            </button>

                    </div>
                       
                    </form>
         
            </div>
        </div>
    </div>
</div>
@endsection
