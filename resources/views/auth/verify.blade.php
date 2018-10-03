@extends('layouts.landing')

@section('content')
<div class="verify-email-page">
    <div class="card">
        <div class="card-header">{{ __('Verificar Correo Electrónico') }}</div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Un nuevo enlace de verificación ha sido enviado a tu correo electrónico') }}
                </div>
            @endif

            {{ __('Antes de proceder, por favor revise su correo electrónico por el enlace de verificación.') }}
            {{ __('Si no recibio el correo') }}, <a href="{{ route('verification.resend') }}">{{ __('click aqui para solicitar otro') }}</a>.
        </div>
    </div>
</div>
@endsection
