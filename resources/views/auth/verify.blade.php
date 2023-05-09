@extends('layouts.inicio.app')
@section('titulo', 'Verifique seu endereço de e-mail')
@section('css')
    <style>
        #tornar-colaborador {
            display: none
        }
    </style>
@endsection
@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card border-radius-10px border-2 border-gray">
                <div class="card-body p-md-5">
                    <h1 class="h3 mb-3 fw-bold">{{ __('Verify Your Email Address') }}</h1>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
