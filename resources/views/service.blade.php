@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
Услуги
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<div class="service">
    <p class="text-white font-semibold">Услуги</p>
    <div class="flex justify-center gap-8 my-5">
        <div class="flex flex-col">
            <img src="{{asset('image/service/remix.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">Ремикс</h2>
            <h3>5000 рублей</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/service/reverb.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">Реверб</h2>
            <h3>2000 рублей</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/service/rework.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">Реворк</h2>
            <h3>3000 рублей</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/service/cover.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">Кавер</h2>
            <h3>10000 рублей</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/service/remake.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">Ремейк</h2>
            <h3>8000 рублей</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/service/slowed.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">Слоу</h2>
            <h3>3000 рублей</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
    </div>
</div>


















@endsection
<!-- Секция с основным изменяемым содержимым -->