@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
Личный кабинет
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<div class="show-flex">
    <div class="show">
        <img class=" pt-8" src="{{asset('image/show/profile.svg')}}" alt="">
        <p class="text-white">{{ $user->name }}</p>
        <p class="text-white text-sm font-thin">{{ $user->email }}</p>
        <a href="{{ route('profile.edit') }}" class="btn btn-danger text-white font-light">Редактировать профиль</a>
        <button class="btn btn-danger text-white font-light">Отследить заказы</button> </a> <!-- Кнопка пока неактивна -->
        <!-- <button class="custom text-white font-light" type="submit" class="btn btn-danger">Редактировать профиль</button> -->
        <button class="custom text-white font-light" type="submit" class="btn btn-danger">Отследить заказы</button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="custom text-white font-light" type="submit" class="btn btn-danger">Выйти</button>
        </form>
    </div>
</div>




















@endsection
<!-- Секция с основным изменяемым содержимым -->