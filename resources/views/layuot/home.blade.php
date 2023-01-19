@extends('./index') <!--Директива, путь к родителю-->

@section('titel')АвтоКлуб@endsection

@section('main-content')
<section class="content-section">
    <h2>О нас</h2>
</section>
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{route('home')}}" class="header-nav-a">Главная</a></li>
        <li><a href="{{route('login')}}" class="header-nav-a">Авторизация</a></li>
    </ul>
@endsection   