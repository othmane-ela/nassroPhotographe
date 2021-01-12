@extends('layouts.app')
@section('title','réinitialiser le mot de passe')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 mx-auto my-5 shadow-sm rounded ">
            <div class="bg-dark-secondary">
                <div class=" text-center text-light font-weight-bold pt-4 text-light">{{ __('réinitialiser le mot de passe') }}</div>


                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}"class="text-muted px-2 py-4">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-light">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control my-in @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center d-block">             
                            <button type="submit" class="m-btn">
                                {{ __('Envoyer le lien') }}
                            </button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
