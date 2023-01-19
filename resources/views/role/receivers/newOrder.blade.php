@extends('./index')

@section('titel')Заказ@endsection

@section('main-content')
    <section class="list-content content-frm-register">
        <form class="frm-register">
            <legend class="legend-form">Новый заказ</legend>
            <div class="form-register-users">
                <div>
                    <label for="client" class="txt-input-form">Выберите клиента или <a href="{{ route('newClient') }}">создайте нового</a></label>
                    <input id="client" type="text" class="input-form">
                    
                    <label for="user" class="txt-input-form">Выберите смену</label>
                    <input id="user" type="text" class="input-form">

                    <table class="tbl-style-light">
                        <tr>
                            <th>№</th>
                            <th>Наименование работы</th>
                            <th>Работник</th>
                            <th>Цена</th>
                            <th>Коллиество</th>
                            <th>Стоимость</th>
                        </tr>
                    </table>
                    <button class="btn btn-light">Добавить</button>   
                    <button class="btn btn-light">Удалить</button>  
                    
                    <button class="btn btn-dark btn-submit btn-list">Сохранить</button>
                </div>
                <div>

                </div>
            </div>
        </form>
    </section>
@endsection
@section('header')
    @parent
    <ul class="navigation-ul-second">
        <li><a href="{{ route('order') }}" class="header-nav-a">Заказы</a></li>
        <li><a href="{{ route('client') }}" class="header-nav-a">Клиенты</a></li>
        <li><a href="{{ route('login') }}" class="header-nav-a">Выход</a></li>
    </ul>
@endsection 