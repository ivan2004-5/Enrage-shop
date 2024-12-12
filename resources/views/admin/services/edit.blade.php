@extends('layouts.app')

@section('content')
<div class="edit-content">
    <form class="edit-flex" action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="edit-block">
            <h1 class="text-white">Редактировать услугу</h1>
            <label class="text-white" for="title">Название</label>
            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
            <label class="text-white" for="price">Цена</label>
            <input type="number" name="price" class="form-control" value="{{ $service->price }}" step="0.01" required>
            <label class="text-white" for="fone_img">Изображение</label>
            <input type="file" name="fone_img" class="form-control-file">
            @if($service->fone_img)
            <img class="text-white" src="{{ asset('storage/' . $service->fone_img) }}" alt="{{ $service->title }}" width="100">
            @endif
            <button type="submit" class="btn btn-primary text-white custom-btn">Обновить</button>
    </form>
</div>
</div>
@endsection