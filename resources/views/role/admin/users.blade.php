@extends('./index')

@section('titel')Сотрудники@endsection

@section('main-content')
    <section class="list-content content-whith-button">
        <table class="tbl-style-light">
            <caption>Сотрудники</caption>
            <tr>
                <th rowspan="2">№</th>
                <th colspan="3">ФИО</th>
                <th rowspan="2">Логин</th>
                <th rowspan="2">Пароль</th>
                <th rowspan="2">Категория</th>
                <th rowspan="2">Фото</th>
                <th class="last-column-for-btn"></th>
            </tr>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
            </tr>
            @foreach($usersData as $userData)
            <tr>
                <th>{{ $userData-> id}}</th>
                <th>{{ $userData-> name}}</th>
                <th>{{ $userData-> surname}}</th>
                <th>{{ $userData-> patronymic}}</th>
                <th>{{ $userData-> login}}</th>
                <th>{{ $userData-> password}}</th>
                <th>{{ $userData-> category}}</th>
                <th class="last-column-for-btn"><a href="{{ route('profile', $userData-> id) }}" class="btn btn-light btn-a">Профиль</a></th>
                <th class="last-column-for-btn"><a class="btn img-btn-fon"><img class="password-img-btn" alt="Открыть профиль сотрудника" src="{{ Vite::asset('resources/images/free-icon-profile.png') }}"></a></th>
            </tr>
            @endforeach
        </table>
        <div class="menu-list-content">
            <a href="{{ route('adminNewUser') }}" class="btn btn-light btn-a">Добавить</a>
            <button class="btn btn-light btn-list">Уволить</button>
            
        </div>
    </section>
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