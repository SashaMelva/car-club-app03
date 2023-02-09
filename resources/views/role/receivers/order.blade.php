@extends('./index')

@section('titel')
    Заказы
@endsection

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
                <th>{{ $orderData->id }}</th>
                <th>{{ $orderData->date }}</th>
                <th></th>
                <th>
                    <table>
                        @foreach ($ordersPointData as $orderPointData)
                            <tr class="second-th">
                                <th class="second-th">{{ $orderPointData->workName }}</th>
                            </tr>
                        @endforeach
                    </table>
                </th>
                <th>
                    <table>
                        @foreach ($ordersPointData as $orderPointData)
                            <tr class="second-th">
                                <th class="second-th price-work">{{ $orderPointData->price }}</th>
                            </tr>
                        @endforeach
                    </table>
                </th>
                <th class="summ-price"></th>
                <th>{{ $orderData->phone }}</th>
                <th>{{ $orderData->surname }} {{ $orderData->name }} {{ $orderData->patronymic }}</th>
                <th class="table-status-update">
                    <form action="{{ route('updateOrderStatus', $orderData->id) }}" method="POST" class="frm-status-update">
                        @csrf
                        <select id="statusOrders" name="statusOrders" class="inpt-hidden slct-form cmb-form cmb-order">
                            @foreach ($ordersStatus as $orderStatus)
                                <option>{{ $orderStatus->statusOrderName }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn img-btn-fon btn-save-status"><img class="password-img-btn"
                                alt="Сохранить статус"
                                src="{{ Vite::asset('resources/images/icon-download.png') }}"></button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>

                    <hr class="line-status-table">

                    {{ $orderData->statusOrderName }}

                </th>
                <th>{{ $orderData->idWorkShift }}</th>
            @endforeach
        </table>
        <div class="menu-list-content">
            <a href="{{ route('newOrder') }}" class="btn btn-light btn-a">Создать</a>
        </div>
    </div>
    <script>
        /*function loadSumm () {
            
            let summTh = document.querySelector('th.summ-price'); 
            let summ = 0;
            let price = document.querySelectorAll('th.price-work'); 
            alert(pric.value);
            for (let i = 0; i < price.length; i++) {
                summ += price[i];
            }
            summTh.innerHTML = summ;
        //}
        
        
    </script>
@endsection

@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{ route('order') }}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{ route('client') }}" class="header-nav-a">Клиенты</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection
