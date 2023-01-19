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
                <th>Открытия</th>
                <th>Закрытия</th>
                <th>Рабочий профиль</th>
                <th>ФИО</th>
            </tr>
        </table>
        <div class="menu-list-content">
            <button class="btn btn-light btn-exit btn-list">Создать новую смену</button>
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