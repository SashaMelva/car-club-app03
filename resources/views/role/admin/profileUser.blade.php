@extends('./index')

@section('titel')
    Новый пользователь
@endsection


@section('main-content')
    <script>
        let check = 0;

        function password_checked() {
            let btn = document.querySelector('button.btn-chk-password');
            let img = document.querySelector('img.password-img-btn');
            let input = document.querySelector('input.input-password');

            if (check % 2 == 0) {
                btn.className = "btn-chk-password btn-new-user-open";
                img.src = "{{ Vite::asset('resources/images/abstract-1151.png') }}";
                input.type = "text";
            }
            if (check % 2 > 0) {
                btn.className = "btn-chk-password btn-new-user-close";
                img.src = "{{ Vite::asset('resources/images/abstract-1152.png') }}";
                input.type = "password";
            }
            check++;
        }
    </script>

    <section class="list-content content-frm-register">
        <div class="form-register-users-skelet">
            <legend class="legend-form legend-new-user">Профиль сотрудника</legend>
            <form class="frm-new-user" action="{{ route('updateUserSubmit', $userData->id) }}" method="POST">
                @csrf
                <label for="name" class="txt-input-form">Имя</label>
                <input id="name" type="text" class="input-form" value=" {{ $userData->name }}">
                <label for="surname" class="txt-input-form">Фамилия</label>
                <input id="surname" type="text" class="input-form" value=" {{ $userData->surname }}">
                <label for="patronymic" class="txt-input-form">Отчество</label>
                <input id="patronymic" type="text" class="input-form" value=" {{ $userData->patronymic }}">
                <label for="login" class="txt-input-form">Логин</label>
                <input id="login" type="text" class="input-form" value=" {{ $userData->login }}">
                <label for="password" class="txt-input-form">Пароль</label>
                <div class="input-password">
                    <input id="password" class="input-form input-password" type="password" value=" {{ $userData->password }}">
                </div>
                <label for="category" class="txt-input-form">Рабочий профиль</label>
                <select id="category" name="category" class="slct-form cmb-form">
                    @foreach($rolesData as $roleData)
                        <option>{{ $roleData-> roleName}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
            </form>

            <div class="content-photo-new-user">

                <div>
                    <div class="content-img-frm">
                        <button class="btn-img-user"></button>
                        <p class="txt-input-form">Фото сотрудника</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('adminUsers') }}" class="btn btn-a btn-dark btn-submit btn-revoke btn-list">Выход</a>
            <button class="btn btn-dark btn-submit btn-save btn-list">Сохранить изменения</button>
        </div>
        <button class="btn-chk-password btn-new-user-close" onclick="password_checked()"><img class="password-img-btn"
                src="{{ Vite::asset('resources/images/abstract-1152.png') }}"></button>
    </section>
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{ route('home') }}" class="header-nav-a">Пользователи</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Рабочие смены</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection
