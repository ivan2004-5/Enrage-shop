<header>

  <div class="head">

    <a href="/"><img src="{{asset('image/logotype.svg')}}" alt="image format png" /></a>
    <div class="flex gap-2">
      <input type="text" placeholder="Поиск..."><button class="search"><img src="{{asset('image/search-icon.svg')}}" alt=""></button>
    </div>
    <a href="{{ route('profile') }}" class="profile">  <!-- Изменено: добавлена ссылка -->
      <img src="{{asset('image/profile.svg')}}" alt="">
    </a>  <!-- Изменено: button заменен на a -->

  </div>
</header>

<div class="under-header min-w-9xl">
  <a href="/" class="min-w-56 text-center border-x-1">Главная</a>
  <a href="service" class="min-w-56 text-center border-x-1">Услуги</a>
  <a href="cart" class="min-w-56 text-center border-x-1">Корзина</a>
</div>