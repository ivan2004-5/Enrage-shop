@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
    Главная
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<div class="page-main__genres container">
        <div class="row m-1 p-5" style="width: 1620px;">
                <div class="col col-12 col-md-6 col-lg-4 col-xl-2 mb-4">
                    <a href="form.php?title=' . urlencode($row['title']) . '&desc=' . urlencode($row['desc']) . '">
                        <div style="width: 250px; height: 250px;"> 
                            <img src="image/' . htmlspecialchars($row['fone_img']) . '" alt="' . htmlspecialchars($row['title']) . '" class="img-fluid clickable-image" style="width: 300px; height: 250px; border: none;"/> 
                            <div></div>
                        </div>
                    </a>


                      <div class="mt-2">
                          <a href="edit.php?title=' . urlencode($row['title']) . '" class="btn btn-primary btn-sm">Изменить</a>
                          <a href="delete.php?title=' . urlencode($row['title']) . '" class="btn btn-danger btn-sm">Удалить</a>
                      </div>
                  

                    </div>
        
        </div>
    </div>

    <div class="container mt-4">
        <div class="text-center">
            <a href="add.php" class="btn btn-success">Добавить новый товар</a>
        </div>
    </div>


@endsection
<!-- Секция с основным изменяемым содержимым -->