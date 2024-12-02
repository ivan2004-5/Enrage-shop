@extends('layouts.app')

@section('content')
    <h1>Редактировать услугу</h1>
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" value="{{ $service->price }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="fone_img">Изображение</label>
            <input type="file" name="fone_img" class="form-control-file">
            @if($service->fone_img)
                <img src="{{ asset('storage/' . $service->fone_img) }}" alt="{{ $service->title }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection