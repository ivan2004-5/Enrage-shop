@extends('layouts.app')
@section('title')
Корзина
@endsection

@section('content')
<section class="new-container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="new-container">
        <div id="cart-content">
            @if(isset($cartItems) && $cartItems->isNotEmpty())
                <div class="in-container">
                    <h3 class="text-white font-light">Ваша корзина:</h3>
                    <ul id="cart-items">
                        @foreach($cartItems as $item)
                            <li class="text-white" data-item-id="{{ $item->id }}">
                                {{ $item->service->title }} - {{ $item->service->price }} рублей ({{ $item->quantity }} шт.) -
                                <a href="#" class="remove-item" data-item-id="{{ $item->id }}">Удалить</a>
                            </li>
                        @endforeach
                    </ul>
                    <a class="text-white" href="{{ route('order.create') }}" class="btn btn-primary">Оформить заказ</a>
                </div>
            @else
                <div class="in-container">
                    <img src="{{asset('image/basket/basket.svg')}}" alt="">
                    <p class="text-white text-xl">Ваша корзина пуста</p>
                    <a class="text-white text-xl" href="{{ route('service') }}">Перейти к услугам</a>
                </div>
            @endif
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.remove-item').click(function(e) {
                e.preventDefault();
                let itemId = $(this).data('item-id');
                let listItem = $(this).closest('li'); // находим родительский элемент <li>

                $.ajax({
                    url: "{{ route('cart.remove', ':itemId') }}".replace(':itemId', itemId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload(); // Удаляем элемент из списка
                        // alert(response.message); // Можно оставить для проверки
                        $('#cart-content').html($('#cart-content').html()); //Обновляем корзину на странице
                    },
                    error: function(xhr, status, error) {
                        alert('Ошибка при удалении товара: ' + error); // Сообщение об ошибке пользователю
                        console.error(error);
                    }
                });
            });
        });
    </script>
</section>
@endsection
