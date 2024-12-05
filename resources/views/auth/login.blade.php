@extends('layouts.auth')

@section('title')
Авторизация
@endsection

@section('content')

<div class="auth-wrapper">

    <div class="enrage mb-12">
        <a href="/"><img src="{{asset('image/auth/enrage.svg')}}" alt=""></a>
    </div>

    <div class="auth-flex">
        <div class="login-block">
            <div class="in-block">{{ __('Вход') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                        <div class="custom">
                            <input placeholder="Почта..." id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                            <input placeholder="Пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="custom-button">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Войти') }}
                        </button>
                        <a
                            href="{{route('yandex')}}"
                            class="w-full gap-1 mt-4 text-hover hover:text-custom-4D52BC hover:border-border-4D52BC h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md font-medium transition-colors
    focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input shadow-sm">
                            Yandex
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-white">
            <p>Ещё нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
        </div>
    </div>
</div>
@endsection