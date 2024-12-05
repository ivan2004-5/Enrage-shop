<header>
  <div class="head">
    <a href="/"><img src="{{asset('image/logotype.svg')}}" alt="image format png" /></a>
    <div class="flex gap-2">
      <input type="text" id="searchInput" placeholder="Поиск...">
      <button class="search" id="searchButton"><img src="{{asset('image/search-icon.svg')}}" alt=""></button>
    </div>
    <a href="{{ route('profile') }}" class="profile">
      <img src="{{asset('image/profile.svg')}}" alt="">
    </a>
  </div>
</header>

<div class="under-header min-w-9xl">
  <a href="/" class="min-w-56 text-center border-x-1">Главная</a>
  <a href="service" class="min-w-56 text-center border-x-1">Услуги</a>
  <a href="cart" class="min-w-56 text-center border-x-1">Корзина</a>
</div>

<script>
document.getElementById('searchButton').addEventListener('click', function() {
    var query = document.getElementById('searchInput').value;
    if (query.trim() !== '') {
        window.location.href = "{{ route('service.search') }}?query=" + encodeURIComponent(query);
    }
});
</script>