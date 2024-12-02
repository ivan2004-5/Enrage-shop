@extends('layouts.app')

@section('content')
<div class="create-cont">
    <form class="create-flex" action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="text-white">Добавления услуги</h1>
        <label class="text-white" for="title">Название</label>
        <input type="text" name="title" class="form-control" required>
        <label class="text-white" for="description">Описание</label>
        <textarea name="description" class="form-control"></textarea>
        <label class="text-white" for="price">Цена</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
        <label class="text-white" for="image">Изображение</label>
        <input class="text-white" type="file" name="fone_img" class="form-control-file">
        <button class="text-white" type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection