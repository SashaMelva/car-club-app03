@extends('./index')

@section('titel')Заказы@endsection

@section('main-content')
    <div class="list-content content-whith-button">
        <table class="tbl-style-light">
            <caption>Заказы</caption>
            <tr>
                <th rowspan="2">№</th>
                <th rowspan="2">Дата</th>
                <th rowspan="2">Время</th>
                <th colspan="2">Работы</th>
                <th rowspan="2">Стоимость</th>
                <th colspan="2">Клиент</th>
                <th rowspan="2">Статус</th>
                <th rowspan="2">№ Смены</th>
            </tr>
            <tr>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Номер телефона</th>
                <th>ФИО</th>
                
            </tr> 
            @foreach ($ordersData as $orderData)
                <th>{{ $orderData-> id }}</th>
                <th>{{ $orderData-> date }}</th>
                <th></th> 
                <th>
                    <table>
                        @foreach ($ordersPointData as $orderPointData)
                            <tr class="second-th">
                                <th class="second-th">{{$orderPointData-> workName}}</th>
                            </tr>
                        @endforeach
                    </table>
                </th>
                <th>
                    <table>
                        @foreach ($ordersPointData as $orderPointData)
                            <tr class="second-th">
                                <th class="second-th">{{$orderPointData-> price}}</th>
                            </tr>
                        @endforeach
                    </table>
                </th>
                <th></th>
                <th>{{ $orderData-> phone }}</th>
                <th>{{ $orderData-> surname}} {{$orderData-> name }} {{$orderData-> patronymic }}</th>
                <th>{{ $orderData-> statusOrderName }}</th>
                <th>{{ $orderData-> idWorkShift }}</th>
                 
            @endforeach
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