@extends('layouts.app')
@section('title') Оформление заказа @endsection

@section('content')
<form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="description">Введите свои данные от соц. сетей</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Оформить заказ</button>
</form>
@endsection

