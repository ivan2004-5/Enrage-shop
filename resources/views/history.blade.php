@extends('layouts.app')

@section('title')
История заказов
@endsection

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">История заказов</h1>

    @if($orders->isEmpty())
        <p class="text-gray-500">У вас пока нет заказов.</p>
    @else
        @foreach($orders as $order)
            <div class="border p-4 rounded-lg mb-4">
                <p><strong>ID заказа:</strong> {{ $order->id }}</p>
                <p><strong>Описание:</strong> {{ $order->description }}</p>
                <p><strong>Общая стоимость:</strong> {{ $order->total_price }}</p>
                <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>

                @if(Auth::user()->is_admin)
                    <!-- Если текущий пользователь - администратор, показываем информацию о пользователе, сделавшем заказ -->
                    <p><strong>Пользователь:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection