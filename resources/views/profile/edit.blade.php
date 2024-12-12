@extends('layouts.app')

@section('title')
Редактирование профиля
@endsection

@section('content')
<div class="edit-container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="profile-block">
            <label class="text-white" for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>

            <label class="text-white" for="email">Почта:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>

            <label class="text-white" for="avatar">Аватар:</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
            @if($user->avatar)
            <img src="data:image/jpeg;base64,{{ base64_encode($user->avatar) }}" alt="Аватар" width="100">
            @endif

            <button type="submit" class="text-white custom btn btn-primary">Сохранить изменения</button>
        </div>
    </form>
</div>

@endsection