@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
    Поддержка
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<divcenter>
		<h2 class="forms text-white">Напишите нам </h2>
		<form method="post" action="server/post.php" class="new_form"> 
			<input type="text" name="name" id_about="name"  title="Введите ваше имя" placeholder="Имя"  required="" >
			<input type="text" name="email" id_about="email" placeholder="Почта" required="">
			<textarea name="txt" id_about="txt" placeholder="Сообщение" required=""></textarea>
			<button type="submit">Отправить</button>
		</form>
	</divcenter>

@endsection
<!-- Секция с основным изменяемым содержимым -->