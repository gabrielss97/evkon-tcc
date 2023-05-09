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
            <div class="col-md-8">
                <div class="card border-radius-10px border-2 border-gray">
                    <div class="card-body p-md-5">
                        <h1 class="h3 mb-3 fw-bold">{{ __('Reset Password') }}</h1>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-12 col-form-label">E-mail</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control form-control-login rounded-0 shadow-none bg-F5F5F5 @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-indigo rounded-0">
                                        {{ __('Send Password Reset Link') }}
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
