@extends('./index') <!--Директива, путь к родителю-->

@section('titel')Авторизация@endsection

@section('main-content')
    <script>
        let check = 0;
        function passwordChecked(){
            let btn = document.querySelector('button.btn-chk-password');
            let img = document.querySelector('img.password-img-btn');
            let input = document.querySelector('input.input-password');

            if(check % 2 == 0 ){
                btn.className = "btn-chk-password btn-chk-password-open";
                img.src = "{{ Vite::asset('resources/images/abstract-1151.png')}}";
                input.type = "text";
            }
            if (check % 2 > 0){
                btn.className = "btn-chk-password btn-chk-password-close";
                img.src = "{{ Vite::asset('resources/images/abstract-1152.png')}}";
                input.type = "password";
            }
            check ++;
        }
    </script>
    
    <section class="autorization-form form-content-login test-authorization">
        <form class="frm-authoriz" method="POST" action="{{ route('login') }}"> 
            @csrf
            <legend class="legend-form">Авторизация</legend>
            <p class="txt-input-form" >Введите логин</p>
            <input id="login" class="input-form" type="text" placeholder="login">
            <p class="txt-input-form" >Введите пароль</p>
            <div class="input-password-content">
                <input id="password" class="input-form input-password" type="password">
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
            <div class="content-whith-button">
                <input class="btn btn-light btn-submit" type="submit" value="Отправить">
                <button class="btn btn-exit btn-dark">Выход</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />   
        </form>
        
        <button class="btn-chk-password btn-chk-password-close" onclick="passwordChecked()"><img class="password-img-btn" src="{{ Vite::asset('resources/images/abstract-1152.png') }}"></button>
       
        <form class="frm-authoriz test-frm-authoriz ">
            <label>Кто ты?</label>
            <a href="{{ route('adminUsers') }}" class="btn btn-light btn-a">Администратор</a>
            <a href="{{ route('order') }}" class="btn btn-light btn-a">Приемщик работ</a>
            <a href="{{ route('mechanicOrder') }}" class="btn btn-light btn-a">Автослесарь</a>
        </form>
    </section>
    
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{route('home')}}" class="header-nav-a">Главная</a></li>
        <li><a href="{{route('login')}}" class="header-nav-a">Авторизация</a></li>
    </ul>
@endsection   