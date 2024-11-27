@extends('layouts.app')
@section('title')
Оформление заказа
@endsection

@section('content')
<form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="description">Описание:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="mp3_file">MP3 файл:</label>
    <input type="file" id="mp3_file" name="mp3_file" accept=".mp3" required>

    <button type="submit">Оформить заказ</button>
</form>












@endsection