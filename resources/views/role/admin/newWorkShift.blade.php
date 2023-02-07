@extends('./index')

@section('titel')Новая смена@endsection


@section('main-content')
    <section class="list-content content-frm-order">
        <form class="frm-register">
            <legend class="legend-form">Новая рабочая смена</legend>
            <div class="form-register-users form-register-work-shift">
                <label for="date" class="txt-input-form">Дата смены</label>
                <input id="date" name="date" class="input-form input-date-time" type="date">
                <div class="content-time-data">
                    <label for="startTime" class="txt-input-form">Время начала смены</label>
                    <label for="endTime" class="txt-input-form">Время конца смены</label>
                    <input id="startTime" name="startTime" class="input-form input-date-time" type="time">
                    <input id="endTime" name="endTime" class="input-form input-date-time" type="time">
                </div>
                <table id='mainTable' class="tbl-style-light">
                    <caption>Сотрудники в рабочей смене</caption>
                    <tr>
                        <th>№</th>
                        <th>Сотрудник</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>
                            <select id="userWork" name="userr" class="inpt-hidden slct-form cmb-form-work-shift">
                                @foreach ($workShiftUsers as $workShiftUser)
                                    <option>{{ $workShiftUser->surname }} {{ $workShiftUser->name }} {{ $workShiftUser->patronymic }} Рабочий профиль:  {{ $workShiftUser->roleName }}</option>
                                @endforeach
                            </select>
                        </th>
                    </tr>
                </table>
                <button type="submit" class="btn btn-dark btn-submit btn-list">Сохранить</button>
            </div>
        </form>
        <div class="btn-content-form-newOrder">
            <a href="{{ route ('adminWorkShift') }}" class="btn btn-a btn-dark btn-list">Отмена</a>
            <button id="addNewRow" class="btn btn-light btn-list">Добавить</button>
        </div>
    </section>
    <script>
        let countRow = 1;


        document.querySelector('#addNewRow').onclick = addRow;

        function addRow() {
            countRow++;

            let table = document.querySelector('#mainTable');
            var elem = document.createElement("tr");

            let first = document.createElement("th");
            first.innerHTML = countRow;
            elem.appendChild(first)

            let second = document.createElement("th");
            let selectWork = document.createElement("select");
            second.appendChild(selectWork);
            selectWork.className = "inpt-hidden slct-form cmb-form-work-shift";
            let optionWork = [
                @foreach ($workShiftUsers as $workShiftUser)
                    "<option>{{ $workShiftUser->surname }} {{ $workShiftUser->name }} {{ $workShiftUser->patronymic }} Рабочий профиль:  {{ $workShiftUser->roleName }}</option>",
                @endforeach
            ];
            let strWorkOption = optionWork.join();
            selectWork.innerHTML = strWorkOption;
            elem.appendChild(second);

            table.appendChild(elem);
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