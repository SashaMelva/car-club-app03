@extends('./index')

@section('titel')Новая смена@endsection


@section('main-content')
<section class="list-content content-frm-register">
    <div class="form-register-users-skelet">
        <legend class="legend-form legend-new-user">Новая смена</legend>
            <form class="frm-new-user" method="POST" action="{{ route('newClientAdd') }}">
                @csrf
                <p class="txt-input-form">Введите данные о клиенте</p>
                <label for="name" class="txt-input-form">Имя</label>
                <input id="name" name="name" type="text" class="input-form">
                <label for="surname" class="txt-input-form">Фамилия</label>
                <input id="surname" name="surname" type="text" class="input-form">
                <label for="patronymic" class="txt-input-form">Отчество</label>
                <input id="patronymic" name="patronymic" type="text" class="input-form">
                <label for="phone" class="txt-input-form">Номер телефона</label>
                <input id="phone" name="phone" type="text" class="input-form">
                @include('inc.messages')
                <button type="submit" class="btn btn-dark btn-submit btn-list">Сохранить</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />   
            </form>
        <a href="{{ route('adminWorkShift') }}" class="btn btn-a btn-dark btn-revoke btn-list">Отмена</a>
    </div>
</section>
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{route('home')}}" class="header-nav-a">Пользователи</a></li>
        <li><a href="{{route('login')}}" class="header-nav-a">Рабочие смены</a></li>
        <li><a href="{{route('login')}}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{route('login')}}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection 