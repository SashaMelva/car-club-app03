@extends('./index')

@section('titel')Новый пользователь@endsection


@section('main-content')
   


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
            </form>
                <div class="content-photo-new-user">
            
                    <label class="txt-input-form">Выберите фото сотрудника</label><br>
                    <div id="drop-area" class="content-img-frm">
                        <label >
                            <img class="btn-img-user img-zone" src="">
                            <input onchange="previewFile()"  id="file-selector" class="input-img" type="file" name="file" accept="image/*">		
                            
                            <span>Выберите файл</span>
                        </label>
                    </div>
                </div>
            <a href="{{ route('adminUsers') }}" class="btn btn-a btn-dark btn-submit btn-revoke-for-user btn-list">Отмена</a>
            <button class="btn btn-dark btn-submit btn-save btn-list">Сохранить</button>
        </div>
        <button class="btn-chk-password btn-new-user-close" onclick="passwordChecked()"><img class="password-img-btn" src="{{ Vite::asset('resources/images/abstract-1152.png')}}"></button>
    </section>

    <script>
        let check = 0;
        function passwordChecked(){
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
    
    const dropArea = document.getElementById('drop-area');

    dropArea.addEventListener('dragover', (event) => {
    event.stopPropagation();
    event.preventDefault();
    // Style the drag-and-drop as a "copy file" operation.
    event.dataTransfer.dropEffect = 'copy';
    });

    dropArea.addEventListener('drop', (event) => {
    event.stopPropagation();
    event.preventDefault();
    const fileList = event.dataTransfer.files;
    console.log(fileList);
    });

    function previewFile() {
        const preview = document.querySelector('img.img-zone');
        const file = document.querySelector('input[type=file]').files[0];
        
        const reader = new FileReader();

        reader.addEventListener("load", () => {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        reader.readAsDataURL(file);
    }

 

    </script>
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