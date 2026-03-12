<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title', 'Мой Не Сам')</title>
</head>
<body class="d-flex flex-column min-vh-100">

@include('components.header')

<main class="container flex-grow-1">
    @yield('content')
</main>

@include('components.footer')

<script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
</body>
</html>
