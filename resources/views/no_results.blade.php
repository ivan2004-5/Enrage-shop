@extends('layouts.app')

@section('title')
Услуги не найдены
@endsection

@section('content')
<div class="service-flex">
    <p class="text-white font-semibold">Услуги не найдены</p>
    <p class="text-white">К сожалению, по вашему запросу ничего не найдено.</p>
    <a href="{{ route('service') }}" class="text-white btn btn-primary">Вернуться к списку услуг</a>
</div>
@endsection