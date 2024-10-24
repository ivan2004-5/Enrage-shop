@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
Главная
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<div class="main">
    <p class="text-white font-black">ТВОЙ ПЕРВЫЙ ХИТ НАЧНЕТСЯ ЗДЕСЬ</p>
    <button>эщкере</button>
</div>
<div class="trending">
    <p class="text-white font-semibold">В тренде</p>
    <div class="flex justify-center gap-8 my-5">
        <div class="flex flex-col">
            <img src="{{asset('image/image.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">HOPE - Pain lil Durk</h2>
            <h3>Dj AIpach</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/image-1.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">HOURS | DON TOLIVER</h2>
            <h3>Prod. Boinovski</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/image-2.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">FALL APART - Drake Type</h2>
            <h3>Will Alexander</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/image-3.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">BALENCIAGA 🔥2+1🔥</h2>
            <h3>Kisses Beats</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/image-4.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">21 Savage x A$ap Rocky</h2>
            <h3>Hocii808</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
        <div class="flex flex-col">
            <img src="{{asset('image/image-5.png')}}" alt="">
            <h2 class="text-white font-semibold my-5">PLAYERS - 1+9 FREE</h2>
            <h3>Anywaywell</h3>
            <button class="text-white mt-2">В корзину</button>
        </div>
    </div>
</div>

<div class="trust">
    <p class="text-center py-5">Нам доверяют:</p>
    <div class="flex justify-center gap-12">
        <img src="{{asset('image/sony.png')}}" alt="">
        <img src="{{asset('image/elektra.png')}}" alt="">
        <img src="{{asset('image/warner.png')}}" alt="">
        <img src="{{asset('image/universal.png')}}" alt="">
        <img src="{{asset('image/ea.png')}}" alt="">
        <img src="{{asset('image/M.png')}}" alt="">
        <img src="{{asset('image/300.png')}}" alt="">
    </div>
</div>

<div class="info-block">

    <section class="career">
        <div class="container-flex">
            <section class="kickstart">
                <div class="info-wrap">
                    <h3 class="title">Начните свою музыкальную карьеру уже сегодня</h3>
                    <div class="perks-wrapper">
                        <div class="perk ng-star-inserted">
                        <img src="{{asset('image/mark.png')}}" alt="mark">
                            <div class="info">
                                <span class="mark-title">Крупнейший рынок высококачественных ремиксов</span>
                            </div>
                            <span class="mark-description">Получите доступ к более чем 322 миллионам битов от нашего растущего сообщества производителей по всему миру.</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

</div>




























































<!-- <div class="info-block">
    <p class="text-white font-extrabold">Начните свою музыкальную карьеру уже сегодня</p>
    <div class="pt-3 block mx-auto">
        <div class="flex">
            <img class="block max-h-6" src="{{asset('image/mark.png')}}" alt="">
            <div class="flex-chest flex-col">
                <h2 class="text-white font-bold pl-3">Крупнейший рынок высококачественных ремиксов</h2>
                <h3 class="pl-3">Получите доступ к более чем 322 миллионам битов от нашего растущего сообщества производителей по всему миру.</h3>
            </div>
        </div>x
        <div class="flex">
            <img class="block max-h-6" src="{{asset('image/mark.png')}}" alt="">

            <div class="flex-chest flex-col">
                <h2 class="text-white font-bold pl-3">Бесперебойный процесс покупки</h2>
                <h3 class="pl-3">Мы делаем это без особых усилий. Просматривайте свои любимые жанры и совершайте покупки с легкостью - и все это на одной платформе.</h3>
            </div>
        </div>
        <div class="flex">
            <img class="block max-h-6" src="{{asset('image/mark.png')}}" alt="">

            <div class="flex-chest flex-col">
                <h2 class="text-white font-bold pl-3">Простые варианты лицензирования</h2>
                <h3 class="pl-3">Контракты не должны сбивать с толку. Тратьте меньше времени на то, чтобы ломать голову, и больше времени на создание вашего нового хита.</h3>
            </div>
        </div>
        <div class="flex">
            <img class="block max-h-6" src="{{asset('image/mark.png')}}" alt="">

            <div class="flex-chest flex-col">
                <h2 class="text-white font-bold pl-3">Сообщество, которое понимает вас</h2>
                <h3 class="pl-3">Мы такие же создатели, как и вы. Независимо от того, нужна ли вам наша команда поддержки или вы хотите сотрудничать с креативщиками-единомышленниками, у нас есть для вас дом.</h3>
            </div>
        </div>
    </div>
</div> -->


@endsection
<!-- Секция с основным изменяемым содержимым -->