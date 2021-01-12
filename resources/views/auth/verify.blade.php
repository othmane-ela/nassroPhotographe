@extends('layouts.app')
@section('title','Verifier votre email')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        @if (session('resent'))
        <div class="alert alert-success mt-5" role="alert">
            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
        </div>
    @endif

        <div class="col-md-12 my-5 py-3 shadow-sm rounded bg-dark-secondary">
            <div class="font-weight-bold text-danger">  <i class="fa text-danger mr-1 fas fa-user-check"></i> {{ __('Vérifiez votre adresse e-mail') }}</div>
                <div class="text-light">
                  
                    {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
                    {{ __("Si vous n'avez pas reçu l'e-mail") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</button>.
                    </form>
                </div>
            </div>
       
    </div>
</div>
@endsection
