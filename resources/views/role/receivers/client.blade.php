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
                <th class="last-column-for-btn"></th>
                <th class="last-column-for-btn"></th>
            </tr>
            @foreach($clientsData as $clientData)
            <tr>
                <th>{{ $clientData-> id}}</th>
                <th>{{ $clientData-> name}}</th>
                <th>{{ $clientData-> surname}}</th>
                <th>{{ $clientData-> patronymic}}</th>
                <th>{{ $clientData-> phone}}</th>
                <th>0</th>
                <th class="last-column-for-btn"><a href="{{ route('clientDelet', $clientData-> id) }}" class="btn img-btn-fon"><img class="password-img-btn" alt="Удалить клиента" src="{{ Vite::asset('resources/images/rejected.png') }}"></a></th>
                <th class="last-column-for-btn"><a href="{{ route('clientUpdate', $clientData-> id) }}" class="btn img-btn-fon"><img class="password-img-btn" alt="Изменить данные о клиенте" src="{{ Vite::asset('resources/images/change.png') }}"></a></th>
            </tr>
            @endforeach
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