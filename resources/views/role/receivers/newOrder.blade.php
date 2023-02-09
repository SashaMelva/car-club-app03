@extends('./index')

@section('titel')
    Заказ
@endsection

@section('main-content')
    <section class="list-content content-frm-order">
        <form class="frm-register" method="POST" action="{{ route('newOrderSubmit') }}">
            @csrf
            <legend class="legend-form">Новый заказ</legend>
            <div class="form-register-users">

                <label for="clientOrder" class="txt-input-form">Выберите клиента или <a href="{{ route('newClient') }}">создайте
                        нового</a></label>
                <select id="clientOrder" name="clientOrder" class="slct-form cmb-form">
                    @foreach ($clientsData as $clientData)
                        <option>{{ $clientData->surname }} {{ $clientData->name }}
                            {{ $clientData->patronymic }}
                        </option>
                    @endforeach
                </select>

                <table id='mainTable' class="tbl-style-light">
                    <caption>Наборы работ</caption>
                    <tr>
                        <th>№</th>
                        <th>Наименование работы</th>
                        <th>Работник</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Стоимость</th>
                        <th class="last-column-for-btn"></th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>
                            <select id="work" name="work" class="inpt-hidden slct-form cmb-form">
                                @foreach ($worksData as $workData)
                                    <option>{{ $workData->workName }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select id="userWork" name="userWork" class="inpt-hidden slct-form cmb-form">
                                @foreach ($userrsData as $userrData)
                                    <option>{{ $userrData->surname }} {{ $userrData->name }}
                                        {{ $userrData->patronymic }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                        <th><input type="text" class="price1 input-form inpt-tbl-frm" placeholder="0"></th>
                        <th><input type="text" class="count1 input-form inpt-tbl-frm" placeholder="0"></th>
                        <th><input type="text" class="summ1 input-form inpt-tbl-frm" placeholder="0" readonly></th>
                    </tr>
                </table>
                <button type="submit" class="btn btn-dark btn-submit btn-list">Сохранить</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </div>
        </form>
        <div class="btn-content-form-newOrder">
            <a href="{{ route('order') }}" class="btn btn-a btn-dark btn-list">Отмена</a>
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
            selectWork.className = "inpt-hidden slct-form cmb-form";
            //Чтение из бд списка работ и группировка его в массив
            let optionWork = [
                @foreach ($worksData as $workData)
                    '<option>{{ $workData->workName }}</option>',
                @endforeach
            ];
            //Преобразование всех значений строк масива в одну
            let strWorkOption = optionWork.join();
            //Добавление списка работ на страницу как html код
            selectWork.innerHTML = strWorkOption;
            elem.appendChild(second);

            let thirds = document.createElement("th");
            let selectWorker = document.createElement("select");
            thirds.appendChild(selectWorker);
            selectWorker.className = "inpt-hidden slct-form cmb-form";
            let optionWorker = [
                @foreach ($userrsData as $userrData)
                    '<option>{{ $userrData->surname }} {{ $userrData->name }} {{ $userrData->patronymic }}</option>',
                @endforeach
            ]
            let strWorkerOption = optionWorker.join();
            selectWorker.innerHTML = strWorkerOption;
            elem.appendChild(thirds);

            let forth = document.createElement("th");
            let inputPrice = document.createElement("input");
            inputPrice.type = "text";
            inputPrice.className = "input-form inpt-tbl-frm";
            inputPrice.classList.add("price" + countRow)
            inputPrice.placeholder = 0;
            forth.appendChild(inputPrice);
            elem.appendChild(forth);

            let fifth = document.createElement("th");
            let inputCount = document.createElement("input");
            inputCount.type = "text";
            inputCount.className = "input-form inpt-tbl-frm";
            inputCount.classList.add("count" + countRow)
            inputCount.placeholder = 0;
            fifth.appendChild(inputCount);
            elem.appendChild(fifth);

            let sixth = document.createElement("th");
            let inputSumm = document.createElement("input");
            inputSumm.type = "text";
            inputSumm.className = "input-form inpt-tbl-frm";
            inputSumm.classList.add("summ" + countRow)
            inputSumm.placeholder = 0;
            sixth.appendChild(inputSumm);
            elem.appendChild(sixth);

            table.appendChild(elem);
        }
/*
         const i = 0;
         let inptAllSumm = document.querySelector(`input.summ${i}`);
         let inptAllprice = document.querySelector(`input.price${i}`);
         let inptAllcount = document.querySelector(`input.count${i}`);
             
         
         document.querySelector(`input.price${i}`).onchange = function () {
             while (i <= countRow) {
                 inptAllSumm.value = inptAllcount.value * inptAllprice.value;
                 i++
                 console.log('hui')
             }
         }
         document.querySelector(`input.count${i}`).onchange = function () {
             while (i < countRow) {
                 inptAllSumm.value = inptAllcount.value * inptAllprice.value;
                
                 console.log('hui')
             }
         }
         i++;*/
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
