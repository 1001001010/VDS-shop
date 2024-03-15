@extends('layouts.admin_app')

@section('admin_content')
    <main>
        <section class="first__section first">
            <div class="container flex align-center justify-between">
                <div class="first__left">
                    <h1>Серверы</h1>
                </div>
            </div>
        </section>
        <section class="second__section second">
            <div class="container">
                <div class="fifth__input flex align-center">
                    <input type="text" placeholder="Поиск" />
                    <a href="/">Поиск</a>
                </div>
                <div>
                    <button class="new_sever" id="open-modal_newserver">Добавить сервер</button>
                    <div id="modal" class="modal">
                        <div class="modal-content">
                            <span class="close">Закрыть</span>
                            <form method="POST" action="{{ route('login') }}" class="">
                                @csrf
                                <div class="new_ser_form">
                                    <div class="reg__input flex align-center">
                                        {{-- <p><span class="bold"></span></p> --}}
                                        <img src="{{ asset('img/PC/CPU.svg') }}" alt="CPU">
                                        <input id="cpu" type="text" class="input" name="cpu"
                                            placeholder="Кол-во ядер" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/RAM.svg') }}" alt="RAM">
                                        <input id="ram" type="text" class="input" name="ram"
                                            placeholder="Кол-во оперативной памяти" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/SSD.svg') }}" alt="SSD">
                                        <input id="ssd" type="text" class="input" name="ssd"
                                            placeholder="Объем SSD" autofocus />
                                    </div>
                                </div>
                                <div class="new_ser_form">
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/IP.svg') }}" alt="IP">
                                        <input id="ip" type="text" class="input" name="ip"
                                            placeholder="Объем SSD" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/USERNAME.svg') }}" alt="USERNAME">
                                        <input id="username" type="text" class="input" name="username"
                                            placeholder="Username" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/PASS.svg') }}" alt="USERNAME">
                                        <input id="password" type="text" class="input" name="password"
                                            placeholder="Password" autofocus />
                                    </div>
                                </div>
                                <div class="new_ser_form">
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/PASS.svg') }}" alt="USERNAME">
                                        <input id="price_month" type="text" class="input" name="price_month"
                                            placeholder="Цена на месяц" autofocus />
                                    </div>
                                    <div class="reg__input flex align-center">
                                        <img src="{{ asset('img/PC/PASS.svg') }}" alt="USERNAME">
                                        <input id="price_month" type="text" class="input" name="price_month"
                                            placeholder="Цена на месяц" autofocus />
                                        <a>Сгенерировать</a>
                                    </div>
                                </div>
                                <div class="new_ser_form">
                                    <div class="reg_select">
                                        <label for="location">Локация</label>
                                        <select id="location" name="location">
                                            <option value="">Москва</option>
                                            <option value="">Фалькенштайн</option>
                                            <option value="">Хельсинки</option>
                                        </select>
                                    </div>
                                    <div class="reg_select">
                                        <label for="OC">Операционная система: </label>
                                        <select id="OC" name="OC">
                                            <option value="">Almalinux</option>
                                            <option value="">Centos</option>
                                            <option value="">Debian</option>
                                            <option value="">Ubuntu</option>
                                            <option value="">Astralinux</option>
                                            <option value="">Windows</option>
                                            <option value="">FreeBSD</option>
                                            <option value="">Rockylinux</option>
                                        </select>
                                    </div>
                                    <div class="reg_select">
                                        <label for="PO">Доп. ПО: </label>
                                        <select id="PO" name="PO">
                                            <option value="">Gitlab</option>
                                            <option value="">Doker</option>
                                            <option value="">Fastpanel</option>
                                            <option value="">Node js</option>
                                            <option value="">Redmine</option>
                                            <option value="">Wireguard</option>
                                            <option value="">Ruby on Rails</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex__col__start">
                                    <ul class="header__reg flex justify-start">
                                        <li>
                                            <button type="submit" href="/">Сохранить</button>
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
                                                <div class="table__item percent">{{ $server->ip }}</div>
                                            </a>
                                            <div class="table__item">{{ $server->location }}</div>
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
        document.getElementById('open-modal_newserver').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'block';
        });


        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('modal')) {
                document.getElementById('modal').style.display = 'none';
            }
        });
    </script>
@endsection
