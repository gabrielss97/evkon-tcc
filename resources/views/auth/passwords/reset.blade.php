@extends('layouts.inicio.app')
@section('titulo', 'Modificar Senha')
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
        <div class="col-md-6">
            <div class="card border-radius-10px border-2 border-gray">
                <div class="card-body p-md-5 ">
                    <h1 class="h3 fw-bold mb-3">{{ __('Reset Password') }}</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class=" col-form-label ">E-mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class=" col-form-label ">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class=" col-form-label ">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-indigo rounded-0">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
