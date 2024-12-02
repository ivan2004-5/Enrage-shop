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
        @if(isset($cartItems) && $cartItems->isNotEmpty())
            <div class="in-container">
                <h3 class="text-white font-light">Ваша корзина:</h3>
                <ul>
                    @foreach($cartItems as $item)
                        <li>{{ $item->service->title }} - {{ $item->service->price }} рублей ({{ $item->quantity }} шт.) - <a href="#" class="remove-item" data-item-id="{{ $item->id }}">Удалить</a></li>
                    @endforeach
                </ul>
                <a href="{{ route('order.create') }}" class="btn btn-primary">Оформить заказ</a> </div>
            </div>
        @else
            <div class="in-container">
                <p class="text-white">Ваша корзина пуста.</p>
                <a class="text-white" href="{{ route('service') }}">Перейти к услугам</a>
            </div>
        @endif
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.remove-item').click(function(e) {
            e.preventDefault();
            let itemId = $(this).data('item-id');
            $.ajax({
                url: "{{ route('cart.remove', ':itemId') }}".replace(':itemId', itemId),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    </script>
</section>
@endsection
