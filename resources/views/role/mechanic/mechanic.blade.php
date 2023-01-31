@extends('./index')

@section('titel')Рабочие смены@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{route('login')}}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{route('login')}}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection 