@extends('layouts.auth')

@section('title')
Регистрация
@endsection

@section('content')
<div class="enrage">
    <a href="/"><img src="{{asset('image/auth/enrage.svg')}}" alt=""></a>
</div>
<div class="auth-flex">
<div class="register-block">
    <div class="in-block">{{ __('Регистрация') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                <div class="custom">
                    <input placeholder="Придумайте свой никнейм" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                <div class="custom">
                    <input placeholder="Введите свою почту" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                <div class="custom">
                    <input placeholder="Придумайте пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                <div class="custom">
                    <input placeholder="Подтвердите пароль" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Зарегистрироваться') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="row mb-0 mt-3">
        </div>
    </div>
</div>
<div class="text-white">
    <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
</div>
</div>

@endsection