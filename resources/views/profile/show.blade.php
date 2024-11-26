@extends('layouts.app')

@section('title')
Личный кабинет
@endsection

@section('content')
<div class="show-flex">
    <div class="show">
        @if($user->avatar)
            <img class="pt-8 rounded-xl" src="data:image/jpeg;base64,{{ base64_encode($user->avatar) }}" alt="Аватар" width="100">
        @else
            <img class="pt-8 rounded-xl" src="{{ asset('image/show/profile.svg') }}" alt="Аватар">
        @endif
        <p class="text-white">{{ $user->name }}</p>
        <p class="text-white text-sm font-thin">{{ $user->email }}</p>
        <a href="{{ route('profile.edit') }}" class="btn btn-danger text-white font-light">Редактировать профиль</a>
        <button class="btn btn-danger text-white font-light">Отследить заказы</button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="custom text-white font-light" type="submit" class="btn btn-danger">Выйти</button>
        </form>
    </div>
</div>
@endsection