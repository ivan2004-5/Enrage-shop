@extends('layouts.app')
@section('title') Оформление заказа @endsection

@section('content')
<div class="cont-order">
    <form class="order-block" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="text-white" for="description">Введите свои данные от соц. сетей</label>
        <textarea class="max-w-44 min-h-12" id="description" name="description" required></textarea>

        <button class="text-white cust-but" type="submit">Оформить заказ</button>
    </form>
</div>
@endsection