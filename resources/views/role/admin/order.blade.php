@extends('./index')

@section('titel')Заказы@endsection

@section('main-content')
    <div class="list-content">
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