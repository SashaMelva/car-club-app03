@extends('./index')

@section('titel')Рабочие смены@endsection

@section('main-content')
    <div class="list-content content-whith-button">
        <table class="tbl-style-light">
            <caption>Рабочие смены</caption>
            <tr>
                <th rowspan="2">№</th>
                <th rowspan="2">Дата</th>
                <th colspan="2" >Время</th>
                <th colspan="2">Сотрудник</th>
                <th rowspan="2">Статус</th>
            </tr>
            <tr>
                <th>Начало смены</th>
                <th>Конец семены</th>
                <th>ФИО</th>
                <th>Рабочий профиль</th>
            </tr>
                @foreach ($workShiftsData as $workShiftData)
                    <th>{{ $workShiftData-> id}}</th>
                    <th>{{ $workShiftData-> date}}</th>
                    <th>{{ $workShiftData-> startTime}}</th>
                    <th>{{ $workShiftData-> endTime}}</th>
                    <th>
                        <table>
                            @foreach ($workersData as $workerData)
                            <tr class="second-th">
                                <th class="second-th">{{$workerData-> name}} {{$workerData-> surname}} {{$workerData-> patronymic}}</th>
                            </tr>
                            @endforeach
                        </table>
                    </th>
                    <th>
                        <table>
                            @foreach ($workersData as $workerData)
                            <tr class="second-th">
                                <th class="second-th">{{$workerData-> roleName}}</th>
                            </tr>
                            @endforeach
                        </table>
                    </th>
                    <th>
                        <select id="workShiftStatus" name="workShiftStatus" class="inpt-hidden slct-form cmb-form cmb-order">
                            @foreach ($workShiftsStatus as $workShiftStatus)
                                <option>{{ $workShiftStatus-> statusWorkShiftName }}</option>
                            @endforeach
                        </select>
                        <a href="#" class="btn img-btn-fon btn-save-status"><img class="password-img-btn" alt="Сохранить статус" src="{{ Vite::asset('resources/images/icon-download.png') }}"></a>
                    </th>
                @endforeach
        </table>
        <div class="menu-list-content">
            <a href="{{ route('newWorkShift') }}" class="btn btn-light btn-a">Создать смену</a>
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