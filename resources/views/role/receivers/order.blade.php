@extends('./index')

@section('titel')Заказы@endsection

@section('main-content')
    <div class="list-content content-whith-button">
        <table class="tbl-style-light">
            <caption>Заказы</caption>
            <tr>
                <th rowspan="2">№</th>
                <th colspan="2">Дата и время</th>
                <th colspan="2">Работы</th>
                <th rowspan="2">Стоимость</th>
                <th colspan="2">Клиент</th>
                <th rowspan="2">Статус</th>
                <th rowspan="2">№ Смены</th>
            </tr>
            <tr>
                <th>Зказа</th>
                <th>Выполнения</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Нмер телефона</th>
                <th>ФИО</th>
            </tr>
        </table>
        <div class="menu-list-content">
            <a href="{{ route('newOrder') }}" class="btn btn-light btn-a">Создать</a>
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