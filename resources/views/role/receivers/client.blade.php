@extends('./index')

@section('titel')Клиенты@endsection

@section('main-content')
    <div class="list-content content-whith-button">
        <table class="tbl-style-light">
            <caption>Клиенты</caption>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Номер телефона</th>
                <th>Количество заказов</th>
            </tr>
        </table>
        <div class="menu-list-content">
            <a href="{{ route('newClient') }}" class="btn btn-light btn-a">Создать</a>
        </div>
    </div>
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{ route('order') }}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{ route('client') }}" class="header-nav-a">Клиенты</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection  