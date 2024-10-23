<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>@yield('title')</title>
    <!-- Выведение соответствующего названия страницы из предствления -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Подключение библиотеки tailwind -->
    <!-- Подключение собственных стилей -->
</script>
</head>
<body class="dark:bgc171717 dark:bg-custom-202124">

@include('components.header')
<!-- Подключение компонента шапки сайта -->

<main>

    @yield('content')

</main>

@include('components.footer')    
<!-- Подключение компонента подвала сайта -->

</body>
</html>