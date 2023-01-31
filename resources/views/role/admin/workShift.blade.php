@extends('./index')

@section('titel')Рабочие смены@endsection

@section('main-content')
    <div class="list-content content-whith-button">
        <table class="tbl-style-light">
            <caption>Рабочие смены</caption>
            <tr>
                <th rowspan="2">№</th>
                <th colspan="2">Дата и время</th>
                <th colspan="2">Сотрудник</th>
                <th rowspan="2">Статус</th>
            </tr>
            <tr>
                <th>Начало смены</th>
                <th>Конец семены</th>
                <th>ФИО</th>
                <th>Рабочий профиль</th>
            </tr>
        </table>
        <div class="menu-list-content">
            <a href="{{ route('newWorkShift') }}" class="btn btn-light btn-a">Создать смену</a>
        </div>
    </div>
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{ route('adminUsers') }}" class="header-nav-a">Сотрудники</a></li>
        <li><a href="{{ route('adminWorkShift') }}" class="header-nav-a">Рабочие смены</a></li>
        <li><a href="{{ route('adminOrder') }}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection  