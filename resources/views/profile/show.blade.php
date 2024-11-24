@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
Личный кабинет
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<h1>Личный кабинет</h1>

<p><strong>Имя:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Выйти</button>
</form>




















@endsection
<!-- Секция с основным изменяемым содержимым -->