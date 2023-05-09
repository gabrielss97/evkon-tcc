@extends('layouts.inicio.app')
@section('titulo', 'Confirmação de senha')
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
                        <h1 class="h3 fw-bold mb-1">{{ __('Confirm Password') }}</h1>

                        {{ __('Please confirm your password before continuing.') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row mb-3 mt-4">
                                <label for="password" class="col-md-12 col-form-label visually-hidden">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" placeholder="Senha">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-indigo rounded-0">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark shadow-none" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
