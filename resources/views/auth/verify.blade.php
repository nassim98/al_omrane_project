@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifiez votre adresse mail') }}</div>

                <div class="card-body">
                    @if (session('renvoyer'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification a été envoyé à votre adresse mail.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez accéder à votre adresse mail pour le lien de vérification.') }}
                    {{ __('Si vous n\'aviez pas reçu de mail') }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour renvoyer un autre') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
