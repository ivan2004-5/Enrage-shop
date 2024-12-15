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
    <div class="alert-1 alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-center gap-8 my-5">
        @foreach ($services as $service)
        <div class="flex flex-col">
            <img src="{{ asset('image/service/' . $service->fone_img) }}" alt="{{ $service->title }}">
            <h2 class="text-white font-semibold my-5">{{ $service->title }}</h2>
            <h3>{{ $service->price }} рублей</h3>
            <button class="add-to-cart text-white mt-2" data-service-id="{{ $service->id }}">В корзину</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            let serviceId = $(this).data('service-id');
            $.ajax({
                url: `/cart/${serviceId}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message); // Можно заменить на более сложный способ обновления части страницы
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    alert('Ошибка при добавлении товара в корзину: ' + error);
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection
<!-- Секция с основным изменяемым содержимым -->