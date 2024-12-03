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

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

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

            @if(auth()->user()->isAdmin())
            <div class="mt-2">
            <button class="text-white btn btn-sm btn-danger"><a href="{{ route('admin.services.edit', $service) }}" class="text-white btn btn-sm btn-primary">Редактировать</a></button>
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline;">
                    @csrf
                    <div>
                    @method('DELETE')
                    <button type="submit" class="text-white btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @if(auth()->user()->isAdmin())
            <div class="mb-5">
                <a href="{{ route('admin.services.create') }}" class="text-white btn btn-primary create-service">Добавить услугу</a>
            </div>
            @endif
</div>
@endsection
<!-- Секция с основным изменяемым содержимым -->