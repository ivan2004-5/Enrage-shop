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
        @foreach ($services as $service)
            <div class="flex flex-col">
                <img src="{{ asset('image/service/' . $service->fone_img) }}" alt="{{ $service->title }}">
                <h2 class="text-white font-semibold my-5">{{ $service->title }}</h2>
                <h3>{{ $service->price }} рублей</h3>
                <form action="{{ route('cart.add', $service->id) }}" method="post">
                    @csrf
                    <button type="submit" class="text-white mt-2">В корзину</button>
                </form>
            </div>
        @endforeach
    </div>
</div>





















@endsection
<!-- Секция с основным изменяемым содержимым -->