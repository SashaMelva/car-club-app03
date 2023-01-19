@extends('./index')

@section('titel')Новый пользователь@endsection


@section('main-content')
    <script>
        let check = 0;
        function password_checked(){
            let btn = document.querySelector('button.btn-chk-password');
            let img = document.querySelector('img.password-img-btn');
            let input = document.querySelector('input.input-password');

            if(check % 2 == 0 ){
                btn.className = "btn-chk-password btn-new-user-open";
                img.src = "{{ Vite::asset('resources/images/abstract-1151.png')}}";
                input.type = "text";
            }
            if (check % 2 > 0){
                btn.className = "btn-chk-password btn-new-user-close";
                img.src = "{{ Vite::asset('resources/images/abstract-1152.png')}}";
                input.type = "password";
            }
            check ++;
        }
    </script>

<section class="list-content content-frm-register">
    <div class="form-register-users-skelet">
        <legend class="legend-form legend-new-user">Новый сотрудник</legend>
        <form class="frm-new-user">
            <p class="txt-input-form main-txt-form">Введите данные о новом сотруднике</p>
            <label for="name" class="txt-input-form">Имя</label>
            <input id="name" type="text" class="input-form">
            <label for="surname" class="txt-input-form">Фамилия</label>
            <input id="surname" type="text" class="input-form">
            <label for="patronymic" class="txt-input-form">Отчество</label>
            <input id="patronymic" type="text" class="input-form">
            <label for="login" class="txt-input-form">Логин</label>
            <input id="login" type="text" class="input-form">
            <label for="password" class="txt-input-form">Пароль</label>
            <div  class="input-password">
                <input id="password" class="input-form input-password" type="password">
            </div>
            <label for="category" class="txt-input-form">Укажите категорию</label>
            <select id="category" class="slct-form cmb-form">
                <option></option>
            </select>
            <!-- <div>
                <label class="txt-input-form">Загрузите фото сотрудника</label><br>
                <div class="content-img-frm">
                    
                    <p class="txt-input-form">Фото сотрудника</p>
                </div>
            </div>-->
        </form>
        
        <div class="content-photo-new-user">
            
            <div>
                <label class="txt-input-form">Выберите фото сотрудника</label><br>
                <div class="content-img-frm">
                    <button class="btn-img-user"></button>
                    <p class="txt-input-form">Фото сотрудника</p>
                </div>
            </div>
        </div>
        <a href="{{ route('adminUsers') }}" class="btn btn-a btn-dark btn-submit btn-revoke btn-list">Отмена</a>
        <button class="btn btn-dark btn-submit btn-save btn-list">Сохранить</button>
    </div>
    <button class="btn-chk-password btn-new-user-close" onclick="password_checked()"><img class="password-img-btn" src="{{ Vite::asset('resources/images/abstract-1152.png')}}"></button>
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