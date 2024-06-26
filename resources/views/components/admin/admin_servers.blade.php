@extends('layouts.admin_app')
@section('title')
    ZETRIX - Админ/Список серверов
@endsection

@section('admin_content') <main>
        <section class="first__section first">
            <img src="{{ asset('img/glare/third_part_1.png') }}" alt="glare" class="third__part-1" />
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <h1>Локации</h1>
                    <div class="tovar">
                        <div class="country_edit">
                            @foreach ($location_list as $list)
                                <p class="table__item">
                                <div class="emoji">
                                    {{ $list->name }}
                                </div>
                                </p>
                            @endforeach
                            <div id="modal_location_delete" class="modal">
                                <div class="modal-content new_server">
                                    <span class="close">Закрыть</span>
                                    <form method="POST" action="{{ route('deleteLocation') }}"
                                        class="flex flex__col__centr">
                                        @csrf
                                        <p>Выберите локацию</p>
                                        <span class="bold" style="padding: 50px">
                                            <select id="server_type" name="location_id">
                                                @foreach ($location_list as $location)
                                                    <option value="{{ $location->id }}" class="emoji">
                                                        {{ $location->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </span>
                                        <ul class="header__reg flex justify-start">
                                            <li>
                                                <button type="submit">Сохранить</button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div id="modal_location_add" class="modal">
                                <div class="modal-content new_server">
                                    <span class="close">Закрыть</span>
                                    <form method="POST" action="{{ route('addLocation') }}" class="flex flex__col__centr">
                                        @csrf
                                        <div class="new_ser_form gap__15">
                                            <div class="reg__input flex align-center">
                                                <img src="{{ asset('img/PC/USERNAME.svg') }}" alt="NAME">
                                                <input id="location_name" type="text" class="input" name="location_name"
                                                    placeholder="Название локации" autofocus />
                                            </div>
                                            <div class="reg__input flex align-center">
                                                <img src="{{ asset('img/PC/LINK.svg') }}" alt="LINK">
                                                <input id="location_link" type="text" class="input" name="location_link"
                                                    placeholder="Ссылка на локацию" autofocus />
                                            </div>
                                        </div>
                                        <ul class="header__reg flex justify-start">
                                            <li>
                                                <button type="submit">Сохранить</button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div class="table__item">
                                <a id="modal_add_location">Добавить локацию</a>
                            </div>
                            <div class="table__item">
                                <a id="modal_delete_location">Удалить локацию</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="first__section first">
            <img class="left_photo" src="{{ asset('img/glare/first_part-1.png') }}" alt="blick" />
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <h1>Серверы</h1>
                </div>
            </div>
        </section>
        <section class="second__section second">
            <div class="container">
                <form method="get" action="{{ route('admin_servers_search') }}">
                    <div class="fifth__input flex align-center">
                        <input type="text" placeholder="Поиск" name="search_servers" id="search_servers" />
                        <button type="submit">Поиск</button>
                    </div>
                </form>
                <div>
                    <button class="new_sever" id="open-modal_newserver">Добавить сервер</button>
                    <div id="modal" class="modal">
                        <div class="modal-content-width">
                            <span class="close">Закрыть</span>
                            <form method="POST" action="{{ route('admin_NewServer') }}" class="">
                                @csrf
                                <div class="new_ser_form">
                                    <div class="reg__input flex align-center">
                                        {{-- <p><span class="bold"></span></p> --}}
                                        <img src="{{ asset('img/PC/CPU.svg') }}" alt="CPU">
                                        <input id="cpu" type="number" class="input" name="cpu"
                                            placeholder="Кол-во ядер" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/RAM.svg') }}" alt="RAM">
                                        <input id="ram" type="number" class="input" name="ram"
                                            placeholder="Кол-во оперативной памяти" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/SSD.svg') }}" alt="SSD">
                                        <input id="ssd" type="number" class="input" name="ssd"
                                            placeholder="Объем SSD" autofocus />
                                    </div>
                                </div>
                                <div class="new_ser_form">
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/IP.svg') }}" alt="IP">
                                        <input id="ip" type="text" class="input" name="ip"
                                            placeholder="IP-адресс" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/USERNAME.svg') }}" alt="USERNAME">
                                        <input id="username" type="text" class="input" name="username"
                                            placeholder="Username" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/PASS.svg') }}" alt="USERNAME">
                                        <input id="password" type="password" class="input" name="password"
                                            placeholder="Password" autofocus />
                                    </div>
                                </div>
                                <div class="new_ser_form">
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/DOLLAR.svg') }}" alt="USERNAME">
                                        <input id="price_month" type="number" class="input" name="price_month"
                                            placeholder="Цена на месяц" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/DOLLAR.svg') }}" alt="USERNAME">
                                        <input id="price_hour" type="number" class="input" name="price_hour"
                                            placeholder="Цена на час" autofocus />
                                    </div>
                                </div>
                                <div class="new_ser_form">
                                    <div class="reg_select">
                                        <label for="location">Локация</label>
                                        <select id="location" name="location">
                                            @foreach ($location_list as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex__col__start">
                                    <ul class="header__reg flex justify-start">
                                        <li>
                                            <button type="submit">Сохранить</button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if (count($servers))
                    <div class="table__wrapper">
                        <div class="table">
                            <div class="table__head table__row">
                                <div class="table__right">
                                    <div class="table__item id">ID</div>
                                    <div class="table__item">Номер</div>
                                    <div class="table__item">IP-адрес</div>
                                    <div class="table__item">Локация</div>
                                    <div class="table__item volume">Цена на месяц</div>
                                    <div class="table__item">Состояние сервера</div>
                                </div>
                            </div>
                            @foreach ($servers as $server)
                                <div class="table__body">
                                    <div class="table__row light">
                                        <div class="table__right">
                                            <a href="{{ route('admin_server', ['id' => $server->id]) }}"
                                                class="table__item">
                                                <div class="table__item-name">{{ $server->id }}</div>
                                            </a>
                                            <a href="{{ route('admin_server', ['id' => $server->id]) }}"
                                                class="table__item">
                                                <div class="table__item-name">{{ $server->number }}</div>
                                            </a>
                                            <a href="{{ route('admin_server', ['id' => $server->id]) }}"
                                                class="table__item">
                                                <div class="table__item percent">{{ $server->ip }}</div>
                                            </a>
                                            <div class="table__item emoji">{{ $locations[$server->id]->name }}</div>
                                            <div class="table__item volume">{{ $server->price_month }}₽</div>
                                            <div class="table__item">
                                                <a target="_blank">{{ $server->status }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Записей не найдено...</p>
                @endif
            </div>
            </div>
            </div>
        </section>
    </main>
    <script>
        document.getElementById('modal_delete_location').addEventListener('click', function() {
            document.getElementById('modal_location_delete').style.display = 'block';
        });
        document.getElementById('modal_add_location').addEventListener('click', function() {
            document.getElementById('modal_location_add').style.display = 'block';
        });
        document.getElementById('open-modal_newserver').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'block';
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('modal_location_delete').style.display = 'none';
        });

        document.getElementsByClassName('close')[1].addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('modal_location_delete').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('modal')) {
                document.getElementById('modal').style.display = 'none';
            }
        });

        function editlogin() {
            let result = prompt("Введите новый логин");
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/server/${id}/editLogin`;
            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';
            const numberField = document.createElement('input');
            numberField.type = 'hidden';
            numberField.name = 'number';
            numberField.value = result;
            form.appendChild(csrfField);
            form.appendChild(numberField);
            document.body.appendChild(form);
            form.submit();
        }
        const notification = document.getElementById('notification');
        const closeButton = document.getElementById('close-button');
    </script>
@endsection
