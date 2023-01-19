<!DOCTYPE html>
<html lang="en" class="page">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titel')</title>
    @vite('resources/js/app.js')
</head>
  <body class="grid-main-content">
    @include('inc.header') <!--Подключает встроеные шаблоны к галавной странице-->
    <main class="conteiner ">
        @yield('main-content')<!--Наименование контейнера, в котором будет содержаться весь контент-->
    </main>
    @include('inc.footer')
  </body>
</html>